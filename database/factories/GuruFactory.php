<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guru;
use Faker\Generator as Faker;

$factory->define(Guru::class, function (Faker $faker) {
    return [
        'nama_depan' => $faker->firstName(),
        'nama_belakang' => $faker->lastName(),
        'kode_guru' => $faker->creditCardNumber,
        'nomor_telepon' => $faker->phoneNumber,
        'alamat_rumah' => $faker->address,
        'email' => $faker->safeEmail
    ];
});
