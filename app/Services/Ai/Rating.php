<?php

namespace App\Services\Ai;

use Illuminate\Support\Facades\Http;

class Rating
{
    /**
     * Fetch event rating from external API.
     *
     * @param string $apiUrl
     * @param array $comments
     * @return array
     */
    public function getEventRating(string $apiUrl, array $comments): array
    {
        // Send a POST request with event comments to the external API
        $response = Http::post($apiUrl, [
            'comments' => $comments
        ]);

        // Return the response in array format
        return $response->json();
    }
}
