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

    }
    public function getFavoriteEvents()
    {

    }

    public function deleteFavoriteEvents(Request $request, string $id)
    {

    }



}
