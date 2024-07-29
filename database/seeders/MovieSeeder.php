<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $faker = Faker::create();
        for ($i = 0; $i < 50; $i++){
            DB::table('movies')->insert([
                'title'=>$faker->text(20),
                'poster'=>'https://vnexpress.net/nguoi-tham-gia-bao-hiem-xa-hoi-sau-1-7-2025-khong-duoc-rut-mot-lan-4764036.html',
                'intro'=>$faker->text(25),
                'release_date'=>$faker->date(),
                'genre_id'=>rand(1,3)
            ]);
        }
    }
}
