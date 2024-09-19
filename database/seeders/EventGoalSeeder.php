<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventGoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_goals')->insert([
            [
                'name' => 'Network with Industry Leaders',
                'event_id' => 1,
            ],
            [
                'name' => 'Learn New Skills',
                'event_id' => 1,
            ],
            [
                'name' => 'Network with Industry Leaders',
                'event_id' => 2,
            ],
            [
                'name' => 'Gain Insights on Market Trends',
                'event_id' => 2,
            ],
            [
                'name' => 'Learn New Skills',
                'event_id' => 3,
            ],
            [
                'name' => 'Share Best Practices',
                'event_id' => 3,
            ],
            [
                'name' => 'Learn New Skills',
                'event_id' => 4,
            ],
            [
                'name' => 'Gain Insights on Market Trends',
                'event_id' => 4,
            ],
            [
                'name' => 'Learn New Skills',
                'event_id' => 5,
            ],
            [
                'name' => 'Gain Insights on Market Trends',
                'event_id' => 5,
            ],
            [
                'name' => 'Learn New Skills',
                'event_id' => 6,
            ],
            [
                'name' => 'Gain Insights on Market Trends',
                'event_id' => 6,
            ],
            [
                'name' => 'Learn New Skills',
                'event_id' => 7,
            ],
            [
                'name' => 'Gain Insights on Market Trends',
                'event_id' => 7,
            ],
        ]);
    }
}
