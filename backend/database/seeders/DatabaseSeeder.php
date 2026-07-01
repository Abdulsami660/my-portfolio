<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SkillSeeder::class,
            ExperienceSeeder::class,
            ProjectSeeder::class,
            EducationSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
