<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Training;
use App\User;
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

$factory->define(Training::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->toArray();
    return [
      'name' => $faker->realText($maxNbChars = 10),
      'day' => $faker->numberBetween($min = 1, $max = 7),
      'duration'  => $faker->numberBetween($min = 30, $max = 120),
      'user_id' => $faker->randomElement($users),
    ];

  });
