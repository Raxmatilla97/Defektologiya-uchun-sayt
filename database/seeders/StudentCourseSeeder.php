<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('student_courses')->insert([
                'sorov_holati' => $faker->randomElement(['maqullandi', 'ruxsat_berilmadi', 'tekshirilmoqda']),
                'course_id' => $i,
                'student_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
