<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Topic;

class TopicTableSeeder extends Seeder
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
            Topic::create([
                'title' => $faker->paragraph(rand(3, 6)),
                'description' => $faker->sentence(rand(6, 10), true),
                'subject_id' => rand(1, 50)
            ]);
        }
    }
}