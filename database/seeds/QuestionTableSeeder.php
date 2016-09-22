<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Question;

class QuestionTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,100) as $index)
        {
            Question::create([
                'title' => $faker->sentence(rand(2, 3)),
                'hint' => $faker->paragraph(rand(5, 10)),
                'anwser' => $faker->paragraph(),
                'details' => $faker->sentence(20, 40),
                'info' => $faker->url(),
                'pic' => $faker->imageUrl(),
                'topic_id' => $faker->randomElement(range(1,15))
            ]);
        }

    }
}