<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizers')->insert([
            [
                'name' => 'IEEE',
                'email' => 'IEEE@team.com',
                'password' => Hash::make('IEEE123'),
                'type' => 'Team',
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CAT Reloaded',
                'email' => 'cat22@team.com',
                'password' => Hash::make('Cat123'),
                'type' => 'Team',
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mohamed Saad',
                'email' => 'Mohamed12@team.com',
                'password' => Hash::make('Mohamed123'),
                'type' => 'Mentor',
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amira Mohamed',
                'email' => 'Amira12@team.com',
                'password' => Hash::make('Amira123'),
                'type' => 'Mentor',
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
