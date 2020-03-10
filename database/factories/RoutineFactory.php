<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Routine;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Routine::class, function (Faker $faker) {

    return [
      'repetitions' => $faker->numberBetween($min = 1, $max = 5),
      'sequences' => $faker->numberBetween($min = 1, $max = 5),
      'seconds_to_rest' => $faker->numberBetween($min = 1, $max = 30),
      'exercise_id' => $faker->numberBetween($min = 1, $max = 5),
      'training_id' => $faker->numberBetween($min = 1, $max = 5),
    ];

  });
