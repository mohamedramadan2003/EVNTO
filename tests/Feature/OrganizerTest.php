<?php

namespace Tests\Feature;

use App\Models\Organizer\Organizer;
use App\Models\Role\Role;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrganizerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function test_example()
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }

    public function test_organizers_index_is_authenticated()
    {
        // Create a user and authenticate
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create some organizers with related models using factory
        $organizer = Organizer::create([
            'name' => 'Test Organizer',
            'email' => 'organizer@example.com',
            'password' => bcrypt('password'),
            'type' => 'Team',
            'role_id' => Role::create(['name' => 'Admin'])->id,
        ]);

            $organizer->events()->createMany([
                [
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
                ],
                [
                    'name' => 'second Test Event',
                    'image' => 'test2-image.jpg',
                    'description' => 'This is a second test event.',
                    'start_date' => now(),
                    'end_date' => now()->addDays(1),
                    'time' => '10:00:00',
                    'type' => 'paid',
                    'status' => 'upcoming',
                    'category' => 'Tech',
                    'booking_link' => 'http://example.com',
                    'organizer_id' => $organizer->id,
                ]
            ])->each(function ($event) {
                // Create a related location for each event
                $event->location()->create([
                    'address' => '123 Event St.',
                    'latitude' => '37.7749',
                    'longitude' => '-122.4194',
                ]);
            });

        // Simulate a request with authentication
        $response = $this->actingAs($user)->getJson('/api/v1/organizers');

        // Assert the response status is 200
        $response->assertStatus(200);

        // Assert that the response contains the expected structure
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'image',
                    'type',
                    'facebook_link',
                    'linkedin_link',
                    'twitter_link',
                    'events' => [
                        '*' => [
                            'name',
                            'image',
                            'description',
                            'start_date',
                            'end_date',
                            'time',
                            'type',
                            'status',
                            'category',
                            'booking_link',
                            'rating',
                            'speakers_name',
                            'speakers_image',
                            'goals',
                            'location_address',
                            'location_latitude',
                            'location_longitude'
                        ]
                    ]
                ]
            ]
        ]);
    }
}
