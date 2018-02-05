<?php

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

$factory->define(App\Models\Device::class, function (Faker $faker) {
    $id = $faker->randomLetter . $faker->randomLetter . $faker->randomLetter;
    return [
        'id'        => $id,
        'name'      => 'Depth Sensor ' . $id,
        'latitude'  => $faker->latitude,
        'longitude' => $faker->longitude,
        'area_id'   => null,
    ];
});
