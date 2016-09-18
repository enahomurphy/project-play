<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Subject;

class SubjectTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,50) as $index)
        {
            Subject::create([

                'name' => $faker->paragraph(2, 5),
                'description' => $faker->sentence(rand(6, 10), true),
                'course_id' => rand(1, 10)


            ]);
        }
    }
}
