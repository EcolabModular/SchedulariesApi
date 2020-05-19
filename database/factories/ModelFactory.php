<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Schedulary;
use Faker\Generator as Faker;

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

$factory->define(Schedulary::class, function (Faker $faker) {
    return [
        'dateStart' => $faker->date($format = 'Y-m-d', $max = 'now'), // '1979-06-09'
        'dateEnd' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'report_id' => $faker->numberBetween(1,50),
        'item_id' => $faker->numberBetween(1,20)
    ];
});
