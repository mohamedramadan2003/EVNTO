<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Event\Event;
use App\Models\Event\EventGoal;
use App\Models\Event\EventLocation;
use App\Models\Event\EventSpeaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('organizer')->latest()->paginate(10);

        return view('dashboard.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        return view('dashboard.events.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the main event data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'time' => 'required',
            'category' => 'required|string|max:255',
            'type' => 'required|in:free,paid',
            'booking_link' => 'nullable|url',
            'location_address' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'goals' => 'nullable|array',
            'speakers' => 'nullable|array',
        ]);

        // Get the authenticated organizer
        $organizer = Auth::guard('organizer')->user();

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/events', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Create the event
        $event = Event::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? null,
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'time' => $validatedData['time'],
            'category' => $validatedData['category'],
            'type' => $validatedData['type'],
            'booking_link' => $validatedData['booking_link'],
            'organizer_id' => $organizer->id,
        ]);

        // Save event location
        EventLocation::create([
            'address' => $validatedData['location_address'],
            'latitude' => $validatedData['latitude'],
            'longitude' => $validatedData['longitude'],
            'event_id' => $event->id,
        ]);

        // Save event goals
        if (!empty($validatedData['goals'])) {
            foreach ($validatedData['goals'] as $goal) {
                EventGoal::create([
                    'name' => $goal,
                    'event_id' => $event->id,
                ]);
            }
        }

        // Save event speakers
        if (!empty($validatedData['speakers'])) {
            foreach ($validatedData['speakers'] as $speaker) {
                EventSpeaker::create([
                    'name' => $speaker,
                    'event_id' => $event->id,
                    'bio' => $request->bio
                ]);
            }
        }

        // Redirect to event list with success message
        return redirect()->route('dashboard.events.index')->with('success', 'Event created successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
