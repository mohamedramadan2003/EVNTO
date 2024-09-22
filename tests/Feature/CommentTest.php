<?php

namespace Tests\Feature;

use App\Models\Event\Event;
use App\Models\Event\EventComment;
use App\Models\Event\EventGoal;
use App\Models\Event\EventLocation;
use App\Models\Event\EventSpeaker;
use App\Models\Organizer\Organizer;
use App\Models\Role\Role;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_comment()
    {
        // Create a user to authenticate
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
        ]);

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


        // Fake the request data
        $data = [
            'description' => 'This is a test comment.',
            'event_id' => $event->id,
        ];

        // Send the request as an authenticated user
        $response = $this->actingAs($user)->postJson('/api/v1/comments', $data);

        // Assert response status is 201 (Created)
        $response->assertStatus(201);

        // Assert the comment is created in the database
        $this->assertDatabaseHas('event_comments', [
            'description' => 'This is a test comment.',
            'event_id' => $event->id,
            'user_id' => $user->id,
        ]);
    }

    public function test_can_show_comments_for_event()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
        ]);
        // Create a user and event
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

        $comments = EventComment::create([
            'description' => 'test comment',
            'user_id' => $user->id,
            'event_id' => $event->id,
            'created_at' => now()
        ]);

        // Send a GET request to fetch comments for the event
        $response = $this->actingAs($user)->getJson('/api/v1/comments/'.$event->id);

        // Assert the response status is 200
        $response->assertStatus(200);
    }

    public function test_can_update_comment()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
        ]);
        // Create a user and event
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

        $comment = EventComment::create([
            'description' => 'test comment',
            'user_id' => $user->id,
            'event_id' => $event->id,
            'created_at' => now()
        ]);

        // New data to update the comment
        $data = ['description' => 'Updated comment'];

        // Send the request as the comment owner
        $response = $this->actingAs($user)->patchJson('/api/v1/comments/'.$comment->id, $data);

        // Assert the response status is 200
        $response->assertStatus(200);

        // Assert the comment is updated in the database
        $this->assertDatabaseHas('event_comments', ['description' => 'Updated comment']);
    }

    public function test_can_delete_comment()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
        ]);
        // Create a user and event
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

        $comment = EventComment::create([
            'description' => 'test comment',
            'user_id' => $user->id,
            'event_id' => $event->id,
            'created_at' => now()
        ]);

        // Send the request as the comment owner
        $response = $this->actingAs($user)->deleteJson('/api/v1/comments/'.$comment->id);

        // Assert the response status is 200
        $response->assertStatus(200);

        // Assert the comment is deleted from the database
        $this->assertDatabaseMissing('event_comments', ['id' => $comment->id]);
    }






}
