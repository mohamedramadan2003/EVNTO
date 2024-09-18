<?php

namespace Database\Seeders;

use App\Models\User\UserInterest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserInterest::create([
            'user_id' => 4,
            'interest' => 'Project Management',
        ]);

        UserInterest::create([
            'user_id' => 4,
            'interest' => 'Time Management',
        ]);

        UserInterest::create([
            'user_id' => 5,
            'interest' => 'Project Management',
        ]);

        UserInterest::create([
            'user_id' => 5,
            'interest' => 'Time Management',
        ]);

        UserInterest::create([
            'user_id' => 6,
            'interest' => 'Project Management',
        ]);

        UserInterest::create([
            'user_id' => 7,
            'interest' => 'Project Management',
        ]);
    }
}
