<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Topic;
use App\Question;
use App\TopicQuestion;
class TopicQuestionTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $topic  = Topic::lists('id')->toArray();
        $question = Question::lists('id')->toArray();
        foreach(range(1,100) as $index)
        {
            TopicQuestion::create([
                'topic_id' => $faker->randomElement($topic),
                'question_id' => $faker->randomElement($question)
            ]);
        }
    }
}