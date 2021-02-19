<?php

use Faker\Generator as Faker;

$factory->define(galeriamedica\Paciente::class, function (Faker $faker) {
    return [
        'registro' => rand(1, 1000000),
        'nombre' => $faker->word(2),
        'app' => $faker->word(1),
        'apm' => $faker->word(1),
    ];
});
