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
        DB::table('event_location')->insert([
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 13,
            ],
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 14,
            ],
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 15,
            ],
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 16,
            ],
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 17,
            ],
            [
                'address' => 'ITI Mansoura University',
                'latitude' => 34.052235,
                'longitude' => -118.243683,
                'event_id' => 18,
            ],

            ]);
    }
}
