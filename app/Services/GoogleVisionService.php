<?php

namespace App\Services;

use Google\Cloud\Vision\V1\AnnotateImageRequest;
use Google\Cloud\Vision\V1\BatchAnnotateImagesRequest;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Image;
use Google\Cloud\Vision\V1\Likelihood;
use Illuminate\Support\Facades\Log;
use Exception;

class GoogleVisionService
{
    private $client;
    private $enabled;

    public function __construct()
    {
        // Fallback to env directly if config not working
        $this->enabled = config('google-cloud-vision.enabled')
            ?? filter_var(env('GOOGLE_CLOUD_VISION_ENABLED', false), FILTER_VALIDATE_BOOLEAN);

        if ($this->enabled) {
            $this->initializeClient();
        }
    }

    private function initializeClient()
    {
        try {
            $keyFile = config('google-cloud-vision.key_file');

            if (!file_exists($keyFile)) {
                throw new Exception("Google Cloud credentials file not found: {$keyFile}");
            }

            $this->client = new ImageAnnotatorClient([
                'credentials' => $keyFile,
                'projectId' => config('google-cloud-vision.project_id')
            ]);

        } catch (Exception $e) {
            Log::error('Google Vision API initialization failed: ' . $e->getMessage());
            throw $e;
        }
    }

    public function extractText(string $imagePath): ?string
    {
        if (!$this->enabled) {
            throw new Exception('Google Vision API is not enabled');
        }

        try {
            // Normalize path untuk Windows
            $imagePath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $imagePath);

            if (!file_exists($imagePath)) {
                throw new Exception("Image file not found: {$imagePath}");
            }

            $imageContent = file_get_contents($imagePath);

            if ($imageContent === false) {
                throw new Exception("Failed to read image file: {$imagePath}");
            }

            // Create image object
            $image = new Image();
            $image->setContent($imageContent);

            // Create feature object for text detection
            $feature = new Feature();
            $feature->setType(Feature\Type::TEXT_DETECTION);

            // Create annotation request
            $request = new AnnotateImageRequest();
            $request->setImage($image);
            $request->setFeatures([$feature]);

            // Create batch request
            $batchRequest = new BatchAnnotateImagesRequest();
            $batchRequest->setRequests([$request]);

            // Execute request
            $response = $this->client->batchAnnotateImages($batchRequest);
            $annotations = $response->getResponses();

            if (count($annotations) > 0) {
                $annotation = $annotations[0];

                if ($annotation->hasError()) {
                    throw new Exception('Vision API Error: ' . $annotation->getError()->getMessage());
                }

                $texts = $annotation->getTextAnnotations();
                return count($texts) > 0 ? $texts[0]->getDescription() : null;
            }

            return null;

        } catch (Exception $e) {
            Log::error('OCR text extraction failed: ' . $e->getMessage());
            Log::error('Image path: ' . $imagePath);
            throw $e;
        }
    }

    public function extractStructuredData(string $imagePath): array
    {
        if (!$this->enabled) {
            throw new Exception('Google Vision API is not enabled');
        }

        try {
            // Normalize path untuk Windows
            $imagePath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $imagePath);

            if (!file_exists($imagePath)) {
                throw new Exception("Image file not found: {$imagePath}");
            }

            $imageContent = file_get_contents($imagePath);

            if ($imageContent === false) {
                throw new Exception("Failed to read image file: {$imagePath}");
            }

            // Create image object
            $image = new Image();
            $image->setContent($imageContent);

            // Create feature object for text detection
            $feature = new Feature();
            $feature->setType(Feature\Type::TEXT_DETECTION);

            // Create annotation request
            $request = new AnnotateImageRequest();
            $request->setImage($image);
            $request->setFeatures([$feature]);

            // Create batch request
            $batchRequest = new BatchAnnotateImagesRequest();
            $batchRequest->setRequests([$request]);

            // Execute request
            $response = $this->client->batchAnnotateImages($batchRequest);
            $annotations = $response->getResponses();

            $result = [
                'full_text' => '',
                'blocks' => [],
                'extracted_fields' => []
            ];

            if (count($annotations) > 0) {
                $annotation = $annotations[0];

                if ($annotation->hasError()) {
                    throw new Exception('Vision API Error: ' . $annotation->getError()->getMessage());
                }

                $texts = $annotation->getTextAnnotations();

                if (count($texts) > 0) {
                    $result['full_text'] = $texts[0]->getDescription();

                    // Process individual text blocks
                    for ($i = 1; $i < count($texts); $i++) {
                        $vertices = $texts[$i]->getBoundingPoly()->getVertices();
                        $result['blocks'][] = [
                            'text' => $texts[$i]->getDescription(),
                            'confidence' => 0.95, // Default confidence since newer API doesn't return this
                            'bounds' => [
                                'x' => $vertices[0]->getX(),
                                'y' => $vertices[0]->getY(),
                                'width' => $vertices[2]->getX() - $vertices[0]->getX(),
                                'height' => $vertices[2]->getY() - $vertices[0]->getY()
                            ]
                        ];
                    }

                    // Extract common fields
                    $result['extracted_fields'] = $this->extractCommonFields($result['full_text']);
                }
            }

            return $result;

        } catch (Exception $e) {
            Log::error('OCR structured data extraction failed: ' . $e->getMessage());
            Log::error('Image path: ' . $imagePath);
            throw $e;
        }
    }

    private function extractCommonFields(string $text): array
    {
        $fields = [];

        // Email
        if (preg_match('/[\w\.-]+@[\w\.-]+\.\w+/', $text, $matches)) {
            $fields['email'] = $matches[0];
        }

        // Malaysian phone numbers
        if (preg_match('/(?:\+?6?01[0-46-9]-*\d{7,8})|(?:\+?6?0\d-*\d{7,8})/', $text, $matches)) {
            $fields['phone'] = $matches[0];
        }

        // Malaysian IC number
        if (preg_match('/\d{6}-\d{2}-\d{4}/', $text, $matches)) {
            $fields['ic_number'] = $matches[0];
        }

        // Simple name extraction
        $lines = explode("\n", $text);
        foreach ($lines as $line) {
            $line = trim($line);
            if (preg_match('/^[A-Z][a-zA-Z\s]{2,50}$/', $line) && str_word_count($line) >= 2) {
                $fields['name'] = $line;
                break;
            }
        }

        return $fields;
    }

    public function __destruct()
    {
        if ($this->client) {
            $this->client->close();
        }
    }
}
