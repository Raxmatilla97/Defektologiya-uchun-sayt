<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Course;
use App\Models\Specialist;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $specialists = Specialist::pluck('id')->toArray();

        for ($i = 0; $i < 60; $i++) {
            Course::create([
                'title' => $faker->sentence,
                'slug' => $faker->slug,
                'image' =>  $faker->randomElement(['assets/images/all-img/e1.png', 'assets/images/all-img/e2.png', 'assets/images/all-img/e3.png'
                , 'assets/images/all-img/e4.png', 'assets/images/all-img/e5.png', 'assets/images/all-img/e6.png']),
                'youtube' => $faker->url,
                'narxi' => $faker->randomNumber(4),
                'davomiylik_vaqti' => $faker->randomNumber(2) . ' days',
                'teacher_id' =>  $faker->randomElement($specialists),
                'desc' => $faker->paragraph,
                'status' => $faker->boolean,
            ]);
        }
    }
}
