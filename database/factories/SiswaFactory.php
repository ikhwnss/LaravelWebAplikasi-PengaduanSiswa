<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Siswa;
use Faker\Generator as Faker;

$factory->define(Siswa::class, function (Faker $faker) {
    return [
        'nama_depan' => $faker->firstName(),
        'nama_belakang' => $faker->lastName(),
        'nis' => $faker->creditCardNumber,
        'nomor_telepon' => $faker->phoneNumber,
        'alamat_rumah' => $faker->address,
        'email' => $faker->safeEmail
    ];
});
