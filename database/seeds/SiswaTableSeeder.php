<?php

use App\Siswa;
use Faker\Generator;
use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
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
                'nama_depan' => "Siswa 1",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'nis' => $faker->unique()->creditCardNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
            [
                'nama_depan' => "Siswa 2",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'nis' => $faker->unique()->creditCardNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
            [
                'nama_depan' => "Siswa 3",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'nis' => $faker->unique()->creditCardNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
            [
                'nama_depan' => "Siswa 4",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'nis' => $faker->unique()->creditCardNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
            [
                'nama_depan' => "Siswa 5",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'nis' => $faker->unique()->creditCardNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
        ];

        Siswa::insert($data);
    }
}
