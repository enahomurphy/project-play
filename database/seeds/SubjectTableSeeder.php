<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


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

        Subject::create([




        ]);
    }
}
