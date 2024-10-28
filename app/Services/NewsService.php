<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NewsService
{
    public function getNewsByTopic($topic)
    {
        $apiKey = env('NEWS_API_KEY');
        Log::info('Using API Key:', ['apiKey' => $apiKey]);  // Log the API key

        $response = Http::get(env('NEWS_API_URL'), [
            'category' => $topic,
            'apiKey' => $apiKey,
        ]);

        if ($response->failed()) {
            Log::error('API request failed', ['status' => $response->status(), 'error' => $response->json()]);
            return [];
        }

        return $response->json()['articles'] ?? [];
    }
}
