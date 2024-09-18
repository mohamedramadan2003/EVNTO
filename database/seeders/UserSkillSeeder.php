<?php

namespace Database\Seeders;

use App\Models\User\UserSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserSkill::create([
            'user_id' => 4,
            'skill' => 'PHP',
        ]);

        UserSkill::create([
            'user_id' => 4,
            'skill' => 'JavaScript',
        ]);

        UserSkill::create([
            'user_id' => 5,
            'skill' => 'Python',
        ]);

        UserSkill::create([
            'user_id' => 5,
            'skill' => 'HTML',
        ]);

        UserSkill::create([
            'user_id' => 6,
            'skill' => 'Flutter',
        ]);

        UserSkill::create([
            'user_id' => 6,
            'skill' => 'dart',
        ]);

        UserSkill::create([
            'user_id' => 7,
            'skill' => 'UI',
        ]);
    }
}
