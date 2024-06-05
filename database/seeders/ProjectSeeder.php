<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 20 ; $i++) {

            $project = new Project();

            $project->title = $faker->sentence(1,4);
            $project->slug = Str::slug($project->title);
            $project->description = $faker->sentence(10, 30);
            $project->creation_date = $faker->dateTimeBetween('-2 years', 'now');
            $project->link = 'https://github.com/Cigno05';

            $project->save();


        }
    }
}
