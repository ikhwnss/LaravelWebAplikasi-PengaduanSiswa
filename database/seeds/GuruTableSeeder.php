<?php

use App\Guru;
use Faker\Generator;
use Illuminate\Database\Seeder;

class GuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $data = [
            [
                'nama_depan' => "Guru 1",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'kode_guru' => $faker->unique()->creditCardNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
            [
                'nama_depan' => "Guru 2",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'kode_guru' => $faker->unique()->creditCardNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
            [
                'nama_depan' => "Guru 3",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'kode_guru' => $faker->unique()->creditCardNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
            [
                'nama_depan' => "Guru 4",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'kode_guru' => $faker->unique()->creditCardNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
            [
                'nama_depan' => "Guru 5",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'kode_guru' => $faker->unique()->creditCardNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
        ];

        Guru::insert($data);
    }
}
