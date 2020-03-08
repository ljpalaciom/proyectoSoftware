<?php

use Illuminate\Database\Seeder;
use App\Exercise;

class ExerciseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Exercise::class,8)->create();
    }
}
