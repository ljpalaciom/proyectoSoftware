<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
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

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'date' => $faker->Date,
        'time' => $faker->Time,
        'description' => $faker->text,
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
        'trainer_id' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
