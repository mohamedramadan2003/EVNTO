<?php

namespace Tests\Feature;

use App\Models\User\User;
use App\Models\User\UserInterest;
use App\Models\User\UserProfile;
use App\Models\User\UserSkill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile; // Make sure this import is present
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase, WithFaker; // Ensure these traits are included

    public function test_it_can_update_user_profile()
    {
        $user = User::create([
            'name' => 'Original Name',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password')
        ]);

        UserProfile::create([
            'user_id' => $user->id,
            'collage_name' => 'Original College'
        ]);

        $this->actingAs($user);

        $data = [
            'name' => 'Updated Name',
            'collage_name' => 'Updated College',
            'image' => UploadedFile::fake()->image('profile.png'), // This should work now
            'skills' => ['Updated Skill 1', 'Updated Skill 2'],
            'interests' => ['Updated Interest 1']
        ];

        $response = $this->putJson('/api/v1/profile', $data);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Profile updated successfully!']);

        $user->refresh();
        $this->assertEquals('Updated Name', $user->name);

        $profile = UserProfile::where('user_id', $user->id)->first();
        $this->assertEquals('Updated College', $profile->collage_name);
        $this->assertNotNull($profile->image); // Check if image was stored

        $skills = UserSkill::where('user_id', $user->id)->pluck('skill')->toArray();
        $this->assertEquals(['Updated Skill 1', 'Updated Skill 2'], $skills);

        $interests = UserInterest::where('user_id', $user->id)->pluck('interest')->toArray();
        $this->assertEquals(['Updated Interest 1'], $interests);
    }
}
