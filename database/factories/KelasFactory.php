<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jurusan;
use App\Kelas;
use Faker\Generator as Faker;

$factory->define(Kelas::class, function (Faker $faker) {
    return [
        'id_jurusan' => factory(Jurusan::class)->create()->id,
        'nama' => $faker->name,
        'detail' => $faker->text()
    ];
});
