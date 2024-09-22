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
                'event_id' => 1,
            ],
            [
                'name' => 'Gain Insights on Market Trends',
                'event_id' => 14,
            ],
            [
                'name' => 'Learn New Skills',
                'event_id' => 15,
            ],
            [
                'name' => 'Share Best Practices',
                'event_id' => 1,
            ],
            [
                'name' => 'Learn New Skills',
                'event_id' => 14,
            ],
            [
                'name' => 'Gain Insights on Market Trends',
                'event_id' => 15,
            ],
            [
                'name' => 'Learn New Skills',
                'event_id' => 16,
            ],
            [
                'name' => 'Gain Insights on Market Trends',
                'event_id' => 17,
            ],
            [
                'name' => 'Learn New Skills',
                'event_id' => 14,
            ],
            [
                'name' => 'Gain Insights on Market Trends',
                'event_id' => 15,
            ],
            [
                'name' => 'Learn New Skills',
                'event_id' => 18,
            ],
            [
                'name' => 'Gain Insights on Market Trends',
                'event_id' => 17,
            ],
        ]);
    }
}
