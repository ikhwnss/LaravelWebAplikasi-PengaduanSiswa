<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WaliMurid;
use Faker\Generator as Faker;

$factory->define(WaliMurid::class, function (Faker $faker) {
    return [
        'nama_depan' => $faker->firstName(),
        'nama_belakang' => $faker->lastName(),
        'nomor_telepon' => $faker->phoneNumber,
        'alamat_rumah' => $faker->address,
        'email' => $faker->safeEmail
    ];
});
