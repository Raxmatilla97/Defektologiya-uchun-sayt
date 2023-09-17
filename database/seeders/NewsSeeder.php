<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            $title = $faker->sentence(6);
            $slug = Str::slug($title); // str_slug() dan Str::slug() ga o'zgartirildi
            $image = $faker->randomElement(['assets/images/all-img/e1.png', 'assets/images/all-img/e2.png', 'assets/images/all-img/e3.png'
            , 'assets/images/all-img/e4.png', 'assets/images/all-img/e5.png', 'assets/images/all-img/e6.png']);
            $desc = $faker->paragraph(4);
            $newsOrEvent = $faker->randomElement(['news', 'event']);
            $status = $faker->boolean();
            $createdAt = Carbon::now();

            DB::table('news')->insert([
                'title' => $title,
                'slug' => $slug,
                'image' => $image,
                'desc' => $desc,
                'news_or_event' => $newsOrEvent,
                'status' => $status,
                'created_at' => $createdAt,
            ]);
        }
    }
}
