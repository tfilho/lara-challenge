<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'birthday' => $faker->dateTimeBetween('1980-01-01', '2010-12-31')->format('m/d/Y'),
        'gender_id' => $faker->randomElement([1, 2, 3]),
    ];
});
