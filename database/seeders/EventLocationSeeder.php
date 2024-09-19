<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_locations')->insert([
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 1,
            ],
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 2,
            ],
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 3,
            ],
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 4,
            ],
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 5,
            ],
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 6,
            ],
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 7,
            ],
            ]);
    }
}
