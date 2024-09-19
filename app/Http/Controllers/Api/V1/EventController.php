<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['speakers', 'goals', 'location'])->get();
        return EventResource::collection($events);

    }

    public function getUpcomingEvents()
    {
        $events = Event::with(['speakers', 'goals', 'location'])
            ->where('status', 'upcoming') // Filter by 'upcoming' status
            ->get();
        return EventResource::collection($events);
    }
    public function show(string $id)
    {
        $event = Event::with(['speakers', 'goals', 'location'])->find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        return new EventResource($event);
    }
    public function setRecommendedEvents(Request $request , string $id)
    {

    }
    public function getRecommendedEvents()
    {

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
    public function getFavoriteEvents()
    {

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



}
