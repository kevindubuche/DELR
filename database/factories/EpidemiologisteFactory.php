<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Epidemiologiste;
use Faker\Generator as Faker;

$factory->define(Epidemiologiste::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'prenom' => $faker->word,
        'email' => $faker->word,
        'username' => $faker->word,
        'telephone' => $faker->word,
        'password' => $faker->word,
        'integer' => $faker->word,
        'image' => $faker->word,
        'user_id' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
