<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Dataclerk;
use Faker\Generator as Faker;

$factory->define(Dataclerk::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'prenom' => $faker->word,
        'email' => $faker->word,
        'username' => $faker->word,
        'password' => $faker->word,
        'role' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
