<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exercise;
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

$factory->define(Exercise::class, function (Faker $faker) {

    return [
      'name' => $faker->realText($maxNbChars = 10),
      'description' => $faker->realText($maxNbChars = 150),
      'recommendations'  => $faker->realText($maxNbChars = 150),
      'path_video'  => $faker->mimeType
    ];

  });
