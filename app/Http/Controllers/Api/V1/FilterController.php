<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\SearchEvent\SearchEventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function search(SearchEventRequest $request)
    {
        $query = $request->input('query');
        $organizerName = $request->input('organizer_name');
        $address = $request->input('address');

        $eventsQuery = Event::query();
        if ($query)
        {
            $eventsQuery->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->orWhere('category', 'LIKE', "%{$query}%");
            });
        }
        if ($organizerName)
        {
            $eventsQuery->whereHas('organizer', function ($q) use ($organizerName) {
                $q->where('name', 'LIKE', '%' . $organizerName . '%');
            });
        }
        if ($address)
        {
            $eventsQuery->whereHas('location', function ($q) use ($address) {
                $q->where(DB::raw('LOWER(address)'), 'LIKE', "%" . strtolower($address) . "%");
            });
        }

        $events = $eventsQuery->with(['speakers', 'goals', 'location', 'organizer'])->get();
        if ($events->isEmpty()) {
            return response()->json([
                'message' => 'No results found.'
            ], 200);
        }
        return EventResource::collection($events);
    }

    public function filter(SearchEventRequest $request)
    {
        $category = $request->input('category');
        $eventType = $request->input('event_type');
        $eventDate = $request->input('event_date');
        $setDate = $request->input('set_date');

        $eventsQuery = Event::query();

        if ($category) {
            $eventsQuery->where('category', 'LIKE', "%{$category}%");
        }

        if ($eventType) {
            $eventsQuery->where('type', $eventType);
        }

        if ($eventDate) {
            $today = Carbon::today();
            $tomorrow = Carbon::tomorrow();
            $endOfWeek = Carbon::now()->endOfWeek();

            switch ($eventDate) {
                case 'today':
                    $eventsQuery->whereDate('start_date', $today);
                    break;
                case 'tomorrow':
                    $eventsQuery->whereDate('start_date', $tomorrow);
                    break;
                case 'this_week':
                    $eventsQuery->whereBetween('start_date', [$today, $endOfWeek]);
                    break;
                case 'set_date':
                    if ($setDate) {
                        $eventsQuery->whereDate('start_date', $setDate);
                    }
                    break;
            }
        }

        $events = $eventsQuery->with(['speakers', 'goals', 'location', 'organizer'])->get();

        if ($events->isEmpty()) {
            return response()->json([
                'message' => 'No results found.'
            ], 200);
        }

        return EventResource::collection($events);
    }
}
