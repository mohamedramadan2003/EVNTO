<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function search(Request $request)
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

    public function filter(Request $request)
    {

    }
}
