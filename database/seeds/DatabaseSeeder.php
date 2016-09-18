<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Course;
use App\Subject;
use App\Question;
use App\Topic;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Model::unguard();

        Course::truncate();
        Subject::truncate();
        Topic::truncate();
        Question::truncate();

        $this->call(TopicTableSeeder::class);
        $this->call(QuestionTableSeeder::class);

        $this->call(CourseTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
    }
}
