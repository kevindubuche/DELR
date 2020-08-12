<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contamine;
use Faker\Generator as Faker;

$factory->define(Contamine::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'prenom' => $faker->word,
        'sexe' => $faker->randomDigitNotNull,
        'commune' => $faker->word,
        'departement' => $faker->word,
        'adresse' => $faker->word,
        'institution' => $faker->word,
        'telephone' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
