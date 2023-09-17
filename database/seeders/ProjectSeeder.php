<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Factory as FakerFactory;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        for ($i = 0; $i < 20; $i++) { 
            Project::create([
                'title' => $faker->sentence,
                'slug' => $faker->slug,
                'image' =>  $faker->randomElement(['assets/images/all-img/e1.png', 'assets/images/all-img/e2.png', 'assets/images/all-img/e3.png'
                , 'assets/images/all-img/e4.png', 'assets/images/all-img/e5.png', 'assets/images/all-img/e6.png']),
                'desc' => $faker->paragraph,
                'status' => $faker->boolean,
            ]);
        }
    }
}
