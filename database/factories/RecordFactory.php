<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Record;
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

$factory->define(Record::class, function (Faker $faker) {
    $users = User::all()->pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'weight' => $faker->numberBetween($min = 20.0, $max = 200.0),
        'height' => $faker->numberBetween($min = 20.0, $max = 200.0),
        'imc' => $faker->numberBetween($min = 40.0, $max = 50.0),
        'user_id' => $faker->randomElement($users),
    ];
});
