<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $courseIds = \App\Models\Course::pluck('id')->toArray();
        $studentIds = \App\Models\User::pluck('id')->toArray();
        
        foreach (range(1, 50) as $index) { // 10 obyekt yaratish uchun o'zgartirishingiz mumkin
            $uniqueCourseId = $faker->unique()->randomElement($courseIds);
            $uniqueStudentId = $faker->unique()->randomElement($studentIds);
            
            \App\Models\StudentCourse::create([
                'course_id' => $uniqueCourseId,
                'student_id' => $uniqueStudentId,
            ]);
            
            // Unique ID lar orqali ishlatilgan ID lar to'plamidan o'chirish
            $courseIds = array_diff($courseIds, [$uniqueCourseId]);
            $studentIds = array_diff($studentIds, [$uniqueStudentId]);
        }
    }
}
