<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = ["html5","css3","javascript","php","react","node","laravel","bootstrap"];

        foreach($technologies as $tec){
            $newTechnology = new Technology();
            $newTechnology->name = $tec;
            $newTechnology->color = $faker->hexColor();
            $newTechnology->save();
        }


    }



}
