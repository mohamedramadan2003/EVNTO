<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventSummaryResource;
use App\Models\Event\Event;
use App\Models\Event\RecommendedEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::with(['speakers', 'goals', 'location', 'organizer'])
            ->filter($request->query())
            ->get();

        return EventSummaryResource::collection($events);

    }
    public function show(string $id)
    {
        $event = Event::with(['speakers', 'goals', 'location'])->find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        return new EventResource($event);
    }

    public function getUpcomingEvents()
    {
        $events = Event::with(['speakers', 'goals', 'location'])
            ->where('status', 'upcoming') // Filter by 'upcoming' status
            ->get();
        return EventResource::collection($events);
    }

    public function setRecommendedEvents(Request $request)
    {
        // Get user ID and the API URL
        $userId = $request->input('user_id');
        $apiUrl = $request->input('api_url', 'https://4e5c-197-32-29-130.ngrok-free.app/recommendations'); // Default API URL

        // Fetch the recommended events from the AI service
        $recommendedEvents = RecommendedEvents::getRecommendedEvents($userId, $apiUrl);

        // Save each recommended event in the database
        foreach ($recommendedEvents['event_id'] as $eventId) {
            RecommendedEvent::updateOrCreate(
                ['user_id' => $userId, 'event_id' => $eventId]
            );
        }

        return response()->json([
            'message' => 'Recommended events saved successfully!',
            'recommended_events' => $recommendedEvents
        ], 200);
    }

    /**
     * Get recommended events for the authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRecommendedEvents()
    {
        $userId = Auth::id();

        // Retrieve recommended events for the authenticated user
        $recommendedEvents = RecommendedEvent::where('user_id', $userId)->get();

        return response()->json([
            'user_id' => $userId,
            'recommended_events' => $recommendedEvents->pluck('event_id')
        ], 200);
    }
    public function setFavoriteEvents(Request $request , string $id)
    {
        $user = auth()->user();
        // Check if the event is already in the user's favorites
        $exists = $user->favouriteEvents()->where('event_id', $id)->exists();

        if ($exists) {
            return response()->json(['message' => 'Event is already in your favorites'], 400);
        }
        $user->favouriteEvents()->attach($id);

        return response()->json(['message' => 'Event added to favorites'], 201);
    }
    public function getUserFavoriteEvents(Request $request)
    {
        $user = auth()->user();
        $status = $request->input('status');

        $query = $user->favouriteEvents()->with(['speakers', 'goals', 'location']);
        if ($status) {
            $query->where('status', $status);
        }
        $favoriteEvents = $query->get();

        if ($favoriteEvents->isEmpty())
        {
            return response()->json([
                'message' => 'No liked events yet'
            ], 200);
        }

        return EventSummaryResource::collection($favoriteEvents);

    }

    public function deleteFavoriteEvents(Request $request, string $id)
    {
        $user = auth()->user();
        $exists = $user->favouriteEvents()->where('event_id', $id)->exists();

        if (!$exists) {
            return response()->json(['message' => 'Event not found in your favorites'], 404);
        }

        $user->favouriteEvents()->detach($id);

        return response()->json(['message' => 'Event removed from your favorites'], 200);
    }

    public function getFavoriteEvents()
    {
        $userId = auth()->id();
        $favouriteEvents = DB::table('favourite_events')
            ->where('user_id', $userId)
            ->pluck('event_id'); // Get only the event IDs

//         Check if there are no favorite events
        if ($favouriteEvents->isEmpty()) {
            return response()->json([
                'message' => 'There are no favorite events'
            ], 200);
        }
        $events = Event::with(['location', 'organizer'])
            ->whereIn('id', $favouriteEvents)
            ->get();

        return EventSummaryResource::collection($events);
    }



}
