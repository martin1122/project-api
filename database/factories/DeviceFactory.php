<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

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
    $depthLimit = $faker->numberBetween(500, 6000);
    return [
        'id'                => $id,
        'area_id'           => null,
        'name'              => 'Depth Sensor ' . $id,
        'latitude'          => $faker->latitude,
        'longitude'         => $faker->longitude,
        'depth_limit'       => $depthLimit,
        'storage_size'      => $faker->numberBetween(1, 32) * 512, //Between 512mb and 16gb
        'delay_period'      => '30',
        'ar_mode_threshold' => $depthLimit - 200,
        'ar_mode_period'    => '5',
        'installed_at'      => new Carbon('-3 years'),
    ];
});
