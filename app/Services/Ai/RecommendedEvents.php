<?php

namespace App\Services\Ai;

use Illuminate\Support\Facades\Http;

class RecommendedEvents
{
    /**
     * Get recommended events from AI service.
     *
     * @param int $userId
     * @param string $apiUrl
     * @return array
     */
    public static function getRecommendedEvents(int $userId, string $apiUrl): array
    {
        // Send a POST request to the external AI service
        $response = Http::post($apiUrl, [
            'user_id' => $userId
        ]);

        // Return the response in array format
        return $response->json();
    }
}

