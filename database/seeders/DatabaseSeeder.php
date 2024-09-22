<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Organizer\Organizer;
use App\Models\Role\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        Role::create([
//            'name' => 'organizer',
//        ]);
//        $this->call(EventSeeder::class);
//        $this->call(EventGoalSeeder::class);
//        $this->call(EventSpeakerSeeder::class);
//        $this->call(EventLocationSeeder::class);

        Role::create([
           'name' => 'Organizer',
        ]);
        Organizer::create([
            'name' => 'IEEE',
            'email' => 'ieee@ieee.com',
            'password' => Hash::make('ieee123'),
            'type' => 'Team',
            'role_id' => 1,
        ]);
    }
}
