<?php

return [
    'project_id' => env('GOOGLE_CLOUD_PROJECT_ID'),
    'key_file' => storage_path('app/private/' . basename(env('GOOGLE_CLOUD_KEY_FILE'))),
    'enabled' => env('GOOGLE_CLOUD_VISION_ENABLED', true),
];
