<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $user_ids = User::inRandomOrder()->pluck('id')->toArray();

        $userIds = range(1, 10);
        shuffle($userIds);
    
         for ($i = 0; $i < 10; $i++) {
             $user_id = null;
    
             if (!empty($user_ids)) {
                 $user_id = array_pop($user_ids);
             }
             $uniqueUserId = array_shift($userIds);

             DB::table('specialists')->insert([
                 'fish' => $faker->name,
                 'slug' => $faker->slug,
                 'image' => $faker->randomElement(['/assets/images/all-img/team1.png', '/assets/images/all-img/team2.png',  '/assets/images/all-img/team3.png', '/assets/images/all-img/team4.png', '/assets/images/all-img/team5.png', '/assets/images/all-img/team6.png']),
                 'desc' => $faker->sentence,
                 'lvl' => $faker->randomElement(['1', '2', '3', '4']),
                 'lavozim' => "Mutaxasis",
                 'email' => $faker->email,
                 'phone' => $faker->phoneNumber,
                 'tg_follow' => $faker->userName,
                 'insta_follow' => $faker->userName,
                 'facebook_follow' => $faker->userName,
                 'status' => $faker->randomElement(['1', '0']),
                 'user_id' => $uniqueUserId,            
             ]);
         }
    }
}
