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
                'image' =>  $faker->randomElement(['/assets/images/all-img/c1.png', '/assets/images/all-img/c2.png', '/assets/images/all-img/c3.png'
                , '/assets/images/all-img/c4.png', '/assets/images/all-img/c5.png', '/assets/images/all-img/c6.png']),
                'youtube' => "https://www.youtube.com/watch?v=UVUo3sqTY2k",
                'narxi' => $faker->randomElement(["200.000 ming so'm", "1.200.000 so'm", "600.000 so'm", "800.000 so'm", "Bepul"]),
                'kurs_tili' => $faker->randomElement(["O'zbek-tilida", 'Rus-tilida']),
                'davomiylik_vaqti' => $faker->randomNumber(2) . ' days',
                'teacher_id' =>  $faker->randomElement($specialists),
                'desc' => $faker->paragraph,
                'status' => $faker->boolean,
                'maqullanganligi' =>  $faker->randomElement(['korilmagan', 'maqullandi', 'rad_etildi']),
                'sabab_desc' => $faker->paragraph,
                
            ]);
        }
    }
}
