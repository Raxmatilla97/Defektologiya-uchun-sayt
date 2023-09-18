<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seminar;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class SeminarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            $title = $faker->sentence(3);
            $slug = Str::slug($title);
            $image = $faker->randomElement(['assets/images/all-img/e1.png', 'assets/images/all-img/e2.png', 'assets/images/all-img/e3.png'
            , 'assets/images/all-img/e4.png', 'assets/images/all-img/e5.png', 'assets/images/all-img/e6.png']);
            $desc = $faker->paragraph(3);
            $boladigan_kun = $faker->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d H:i:s');
            $status = $faker->boolean;
            $tafsiya_etilgan = $faker->boolean;

            Seminar::create([
                'title' => $title,
                'slug' => $slug,
                'image' => $image,
                'desc' => $desc,
                'boladigan_kun' => $boladigan_kun,
                'status' => $status,
                'tafsiya_etilgan' => $tafsiya_etilgan,
            ]);
        }
    }
}
