<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mohamed Saad',
            'email' => 'Mohamed12@example.com',
            'password' => Hash::make('Mohamed123'),
            'provider' => null,
            'provider_id' => null,
            'provider_token' => null,
        ]);

        User::create([
            'name' => 'Amira',
            'email' => 'Amira12@example.com',
            'password' => Hash::make('Amira123'),
            'provider' => null,
            'provider_id' => null,
            'provider_token' => null,
        ]);

        User::create([
            'name' => 'Ahmed Arafat',
            'email' => 'Ahmed12@example.com',
            'password' => Hash::make('Ahmed123'),
            'provider' => null,
            'provider_id' => null,
            'provider_token' => null,
        ]);

        User::create([
            'name' => 'Reem',
            'email' => 'Reem12@example.com',
            'password' => Hash::make('Reem123'),
            'provider' => null,
            'provider_id' => null,
            'provider_token' => null,
        ]);
    }
}
