<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService {

    protected $whatsappApiUrl = 'https://app.macrowa.com/api';
    protected $whatsappApiInstance;
    protected $whatsappApiAccessToken;

    public function __construct()
    {
        $this->whatsappApiInstance = env('WHATSAPP_API_INSTANCE_ID');
        $this->whatsappApiAccessToken = env('WHATSAPP_API_ACCESS_TOKEN');
    }

    public function sendText($phone, $message)
    {
        return Http::post($this->whatsappApiUrl . '/send', [
            'instance_id' => $this->whatsappApiInstance,
            'access_token' => $this->whatsappApiAccessToken,
            'number' => $phone,
            'type' => 'text',
            'message' => $message,
        ]);
    }
}