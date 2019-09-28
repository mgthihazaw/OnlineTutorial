<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\video;
use Faker\Generator as Faker;

$factory->define(video::class, function (Faker $faker) {
    return [
        'title' => $faker->colorName,
        'description' => $faker->paragraph,
        'series_id' =>$faker->numberBetween(1,10),
        'episode_number' =>$faker->numberBetween(1,15),
    ];
});
