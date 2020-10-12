<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
        'profile_id' => factory(App\Profile::class),
        'topic' => $faker->sentence(5),
        'description' => $faker->realText(200),
    ];
});
