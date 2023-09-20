<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(SeminarSeeder::class);
        $this->call(SpecialistSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(VideoDarslarSeeder::class);
    }
}
