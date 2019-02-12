<?php

use App\Models\Configuration;
use Faker\Generator as Faker;

$factory->define(Configuration::class, function (Faker $faker) {
    return [
        'key' => $faker->word,
        'value' => $faker->word,
        'descripcion' => $faker->text,
    ];
});
