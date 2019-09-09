<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Permissao;
use Faker\Generator as Faker;

$factory->define(Permissao::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'slug' => $faker->word,
    ];
});
