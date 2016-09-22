<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Course;

class CourseTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 2) as $index)
        {
            Course::create([

                'title' => $faker->sentence(rand(2, 3)),
                'class' => $faker->randomElement(['ss1', 'ss2', 'ss3']),
                'description' => $faker->paragraph(rand(5, 10), true)

            ]);

        }



    }
}