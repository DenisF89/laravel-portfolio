<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $n = Type::all()->count(); //conta quante tipologie ci sono nel db
        for($i=0;$i<10;$i++){
            $newProject = new Project();
            $name = $faker->word();
            $newProject->name = $name;
            $newProject->client = $faker->company();
            $newProject->year = $faker->dateTimeThisDecade()->format('Y');
            $newProject->image = "project-".($i+1).".jpg";
            $newProject->description = $faker->paragraphs(3, true);
            $newProject->type_id = rand(1, $n); //id casuale tra 1 e count di tipologie nel db
            $newProject->save();
        }
    }
}
