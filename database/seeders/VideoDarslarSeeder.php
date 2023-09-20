<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\VideoDarslar;
use Faker\Factory as FakerFactory;

class VideoDarslarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        // Get all course IDs
        $courseIds = Course::pluck('id')->all();

        // Create fake data for Model
        for ($i = 0; $i < 20; $i++) {
            $createdAt = $faker->dateTimeBetween('-1 year', 'now');
            $updatedAt = $faker->dateTimeBetween($createdAt, 'now');

            VideoDarslar::create([
                'title' => $faker->sentence,
                'desc' => $faker->paragraph,
                'youtube' => $faker->randomElement(['https://www.youtube.com/watch?v=-yOq2bD_GpU', 'https://www.youtube.com/watch?v=IdjDjxNn9ws', 'https://www.youtube.com/watch?v=JdqL89ZZwFw']),
                'status' => $faker->randomElement(['active', 'inactive']),
                'kurs_id' => $faker->randomElement($courseIds),
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ]);
        }
    }
}
