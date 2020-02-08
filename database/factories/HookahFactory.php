<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Hookah;
use Faker\Generator as Faker;

$factory->define(Hookah::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'tubes_count' => rand(2, 8),
    ];
});
