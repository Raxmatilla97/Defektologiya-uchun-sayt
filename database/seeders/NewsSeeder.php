<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(6);
            $slug = Str::slug($title); // str_slug() dan Str::slug() ga o'zgartirildi
            $image = $faker->imageUrl(640, 480);
            $desc = $faker->paragraph(4);
            $newsOrEvent = $faker->randomElement(['news', 'event']);
            $status = $faker->boolean();

            DB::table('news')->insert([
                'title' => $title,
                'slug' => $slug,
                'image' => $image,
                'desc' => $desc,
                'news_or_event' => $newsOrEvent,
                'status' => $status,
            ]);
        }
    }
}
