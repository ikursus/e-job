<?php

namespace App\Http\Controllers;

use App\Services\GoogleVisionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OCRController extends Controller
{
    private $visionService;

    public function __construct(GoogleVisionService $visionService)
    {
        $this->visionService = $visionService;
    }

    public function index()
    {
        return view('pengguna.ocr.index');
    }

    public function processImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120' // 5MB max
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $tempFilePath = null;

        try {
            $image = $request->file('image');
            $fileName = 'ocr_' . time() . '.' . $image->getClientOriginalExtension();

            // Create temp directory if doesn't exist
            $tempDir = storage_path('app' . DIRECTORY_SEPARATOR . 'temp');
            if (!is_dir($tempDir)) {
                mkdir($tempDir, 0755, true);
                \Log::info('Created temp directory: ' . $tempDir);
            }

            // Use direct file move instead of Laravel storage
            $tempFilePath = $tempDir . DIRECTORY_SEPARATOR . $fileName;

            \Log::info('Attempting to move file to: ' . $tempFilePath);
            \Log::info('Temp file original path: ' . $image->getPathname());
            \Log::info('Temp file size: ' . $image->getSize() . ' bytes');

            // Move uploaded file directly
            if (!$image->move($tempDir, $fileName)) {
                throw new \Exception('Failed to move uploaded file to temp directory');
            }

            \Log::info('File moved successfully');
            \Log::info('File exists after move: ' . (file_exists($tempFilePath) ? 'YES' : 'NO'));

            if (!file_exists($tempFilePath)) {
                throw new \Exception("File not found after move: {$tempFilePath}");
            }

            // Process with Google Vision
            $result = $this->visionService->extractStructuredData($tempFilePath);

            // Clean up temporary file
            if (file_exists($tempFilePath)) {
                unlink($tempFilePath);
                \Log::info('Cleaned up temp file: ' . $tempFilePath);
            }

            return response()->json([
                'success' => true,
                'data' => $result
            ]);

        } catch (\Exception $e) {
            // Clean up on error
            if ($tempFilePath && file_exists($tempFilePath)) {
                unlink($tempFilePath);
            }

            \Log::error('OCR Controller Error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'OCR processing failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function extractFormData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $tempFilePath = null;

        try {
            $image = $request->file('image');
            $fileName = 'form_' . time() . '.' . $image->getClientOriginalExtension();

            // Create temp directory if doesn't exist
            $tempDir = storage_path('app' . DIRECTORY_SEPARATOR . 'temp');
            if (!is_dir($tempDir)) {
                mkdir($tempDir, 0755, true);
                \Log::info('Created temp directory: ' . $tempDir);
            }

            // Use direct file move
            $tempFilePath = $tempDir . DIRECTORY_SEPARATOR . $fileName;

            \Log::info('Form extraction - Moving file to: ' . $tempFilePath);

            if (!$image->move($tempDir, $fileName)) {
                throw new \Exception('Failed to move uploaded file to temp directory');
            }

            if (!file_exists($tempFilePath)) {
                throw new \Exception("File not found after move: {$tempFilePath}");
            }

            $result = $this->visionService->extractStructuredData($tempFilePath);

            // Clean up
            if (file_exists($tempFilePath)) {
                unlink($tempFilePath);
            }

            return response()->json([
                'success' => true,
                'fields' => $result['extracted_fields'],
                'full_text' => $result['full_text']
            ]);

        } catch (\Exception $e) {
            // Clean up on error
            if ($tempFilePath && file_exists($tempFilePath)) {
                unlink($tempFilePath);
            }

            \Log::error('Form extraction error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
