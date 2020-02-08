<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SmokingBar;
use Faker\Generator as Faker;

$factory->define(SmokingBar::class, function (Faker $faker) {
    return [
        'name' => $faker->word()
    ];
});
