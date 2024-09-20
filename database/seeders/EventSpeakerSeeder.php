<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_speakers')->insert([
            [
                'name' => 'Amira Mohamed',
                'image' => 'amira.jpg',
                'bio' => 'A leader in Backend development using Laravel.',
                'event_id' => 15,
            ],
            [
                'name' => 'Reem Magdi',
                'image' => 'reem.jpg',
                'bio' => 'A leader in Mobile and web design.',
                'event_id' => 13,
            ],
            [
                'name' => 'Alaa Ashraf',
                'image' => 'alaa.jpg',
                'bio' => 'A leader in Business research',
                'event_id' => 18,
            ],
            [
                'name' => 'Ahmed Arafat',
                'image' => 'ahmed.jpg',
                'bio' => 'A leader in Mobile development using Flutter',
                'event_id' => 14,
            ],
            [
                'name' => 'Mohamed Yosef',
                'image' => 'mohamed_yo.jpg',
                'bio' => 'A leader in AI research and ML',
                'event_id' => 15,
            ],
            [
                'name' => 'Mohamed Saad',
                'image' => 'mohamed.jpg',
                'bio' => 'A leader in Backend development using Laravel',
                'event_id' => 14,
            ],
            [
                'name' => 'Ahmed Hossam',
                'image' => 'mohamed.jpg',
                'bio' => 'A leader in Mobile development using Flutter',
                'event_id' => 16,
            ],
            [
                'name' => 'Moamen ElSayed',
                'image' => 'Moamen.jpg',
                'bio' => 'A leader in Mobile and web design',
                'event_id' => 17,
            ],
            [
                'name' => 'Dr. Sara',
                'image' => 'sara.jpg',
                'bio' => 'A passionate advocate for business growth and development.',
                'event_id' => 18,
            ],



        ]);
    }
}
