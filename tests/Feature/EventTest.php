<?php

namespace Tests\Feature;

use App\Models\Event\Event;
use App\Models\Event\EventGoal;
use App\Models\Event\EventLocation;
use App\Models\Event\EventSpeaker;
use App\Models\Organizer\Organizer;
use App\Models\Role\Role;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_all_events_with_related_data()
    {
        // Create a user and authenticate
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user, 'sanctum');

        $organizer = Organizer::create([
            'name' => 'Test Organizer',
            'email' => 'organizer@example.com',
            'password' => bcrypt('password'),
            'type' => 'Team',
            'role_id' => Role::create(['name' => 'Admin'])->id,
        ]);

        $event = Event::create([
            'name' => 'Test Event',
            'image' => 'test-image.jpg',
            'description' => 'This is a test event.',
            'start_date' => now(),
            'end_date' => now()->addDays(1),
            'time' => '10:00:00',
            'type' => 'paid',
            'status' => 'upcoming',
            'category' => 'Education',
            'booking_link' => 'http://example.com',
            'organizer_id' => $organizer->id,
        ]);

        EventLocation::create([
            'address' => '123 Test St',
            'latitude' => '12.345678',
            'longitude' => '98.765432',
            'event_id' => $event->id,
        ]);

        // Create related speakers
        EventSpeaker::create(['name' => 'Speaker One', 'image' => 'speaker1.jpg', 'bio' => 'Speaker bio', 'event_id' => $event->id]);
        EventSpeaker::create(['name' => 'Speaker Two', 'image' => 'speaker2.jpg', 'bio' => 'Speaker bio', 'event_id' => $event->id]);

        // Create related goals
        EventGoal::create(['name' => 'Goal One', 'event_id' => $event->id]);
        EventGoal::create(['name' => 'Goal Two', 'event_id' => $event->id]);

        // Make the request
        $response = $this->getJson('/api/v1/events');

        // Assert the response status and structure
        $response->assertStatus(200);

    }
}
