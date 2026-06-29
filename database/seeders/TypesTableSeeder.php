<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
            $types = config("projects_types");
            foreach($types as $type){

            $newType = new Type();

            $newType->name = $type;
            $newType->description = $faker->sentence();

            $newType->save();
        }

    }

}
