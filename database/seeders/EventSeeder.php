<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'name' => 'IEEE VICTORIS 3.0',
                'image' => 'tech_IEEE_2024.jpg',
                'description' => 'It is an opportunity to enhance your expertise and gain experience through participation with other contestants.',
                'start_date' => '2024-09-25',
                'end_date' => '2024-09-26',
                'time' => '9:00:00',
                'type' => 'free',
                'status' => 'upcoming',
                'category' => 'Technology',
                'booking_link' => 'https://example.com/book/tech-conference-2024',
                'organizer_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CAT Scope 24',
                'image' => 'business_workshop.jpg',
                'description' => 'The Event aimed at helping Students grow their technical skills.',
                'start_date' => '2024-09-07',
                'end_date' => '2024-09-08',
                'time' => '10:00:00',
                'type' => 'free',
                'status' => 'past',
                'category' => 'Technology',
                'booking_link' => 'https://example.com/book/business-workshop',
                'organizer_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Backend with Mohammed Saad',
                'image' => 'Backend_workshop.jpg',
                'description' => 'The Bootcamp aimed at helping Students grow their technical skills in Backend Track.',
                'start_date' => '2024-10-01',
                'end_date' => '2024-11-15',
                'time' => '10:00:00',
                'type' => 'paid',
                'status' => 'upcoming',
                'category' => 'Bootcamp',
                'booking_link' => 'https://example.com/book/business-workshop',
                'organizer_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Technical Gates 4.0',
                'image' => 'technical.jpg',
                'description' => 'The Workshop aimed at helping Students grow their technical skills.',
                'start_date' => '2024-09-02',
                'end_date' => '2024-09-03',
                'time' => '10:00:00',
                'type' => 'free',
                'status' => 'past',
                'category' => 'Workshop',
                'booking_link' => 'https://example.com/book/ai-healthcare',
                'organizer_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Learn English with Amira Mohamed',
                'image' => 'english.jpg',
                'description' => 'The Study group aimed at helping Students grow their English skills.',
                'start_date' => '2024-10-05',
                'end_date' => '2024-11-10',
                'time' => '10:00:00',
                'type' => 'paid',
                'status' => 'upcoming',
                'category' => 'Study Group',
                'booking_link' => 'https://example.com/book/ai-healthcare',
                'organizer_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
            'name' => 'Presentation Skills',
            'image' => 'skills.jpg',
            'description' => 'The Seminar aimed at helping Students grow their soft skills.',
            'start_date' => '2024-10-25',
            'end_date' => '2024-11-10',
            'time' => '10:00:00',
            'type' => 'paid',
            'status' => 'upcoming',
            'category' => 'Seminar',
            'booking_link' => 'https://example.com/book/ai-healthcare',
            'organizer_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]);
    }
}
