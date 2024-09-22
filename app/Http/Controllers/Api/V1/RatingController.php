<?php

namespace App\Http\Controllers;

use App\Models\Event\EventComment;
use App\Models\Event\RatingEvent;

use App\Services\Ai\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    protected $ratingService;

    public function __construct(Rating $ratingService)
    {
        $this->ratingService = $ratingService;
    }

    /**
     * Fetch and store ratings for an event.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeEventRating(Request $request)
    {
        // Get the data from the request
        $eventId = $request->input('event_id');
        $description = $request->input('description');
        $apiUrl = $request->input('api_url'); // Get API URL from request

        // Add comment to the event
        $comment = EventComment::addComment($eventId, $description);

        // Fetch the rating from external API using the comment
        $response = $this->ratingService->getEventRating($apiUrl, [$comment->description]);

        // Check if we received a rating
        if (isset($response['rating'])) {
            // Store the rating in the database
            RatingEvent::updateOrCreate(
                ['event_id' => $eventId],
                ['rating' => $response['rating']]
            );

            return response()->json([
                'message' => 'Rating saved successfully!',
                'rating' => $response['rating']
            ]);
        }

        return response()->json(['error' => 'Failed to get rating from API'], 400);
    }
}
