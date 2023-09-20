<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Factory as FakerFactory;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */



      public function run()
      {
          $faker = FakerFactory::create();
  
          // Disable timestamps for mass assignment
          User::unsetEventDispatcher();
  
          // Generate fake timestamps
          $createdAt = $faker->dateTimeBetween('-1 year', 'now');
          $updatedAt = $faker->dateTimeBetween($createdAt, 'now');
  
          DB::table('users')->insert([
              'name' => 'Raxmatilla Fayziyev',
              'email' => 'wi.fi.xor@gmail.com',
              'roll' => 'admin',
              'password' => Hash::make('5579187Er'),
              'created_at' => $createdAt,
              'updated_at' => $updatedAt,
          ]);
      }
}
