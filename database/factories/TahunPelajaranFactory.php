<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TahunPelajaran;
use Faker\Generator as Faker;

$factory->define(TahunPelajaran::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'aktif' => 0
    ];
});
