<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Nota::class, function (Faker $fake) {
    return [
        'titulo' => $fake->word,
        'descripcion' => $fake->word,
//        'created_at' => $fake->date('Y-m-d H:i:s'),
//        'updated_at' => $fake->date('Y-m-d H:i:s'),
//        'deleted_at' => $fake->date('Y-m-d H:i:s')
    ];
});
