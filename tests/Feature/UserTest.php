<?php

namespace Tests\Feature;

use App\Models\User\User;
use App\Models\User\UserInterest;
use App\Models\User\UserProfile;
use App\Models\User\UserSkill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    /** @test */
    public function it_can_get_all_users_with_profile_skills_and_interests()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password')
        ]);

        UserProfile::create([
            'user_id' => $user->id,
            'collage_name' => 'Test College'
        ]);

        UserSkill::create([
            'user_id' => $user->id,
            'skill' => 'Test Skill'
        ]);

        UserInterest::create([
            'user_id' => $user->id,
            'interest' => 'Test Interest'
        ]);

        $response = $this->getJson('/api/v1/users');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'college_name',
                        'relations' => [
                            'user_skills',
                            'user_interests'
                        ]
                    ]
                ]
            ])
            ->assertJson([
                'data' => [
                    [
                        'id' => $user->id,
                        'college_name' => 'Test College',
                        'relations' => [
                            'user_skills' => ['Test Skill'],
                            'user_interests' => ['Test Interest']
                        ]
                    ]
                ]
            ]);
    }

}
