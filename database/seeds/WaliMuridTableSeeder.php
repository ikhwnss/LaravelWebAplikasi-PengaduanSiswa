<?php

use App\WaliMurid;
use Faker\Generator;
use Illuminate\Database\Seeder;

class WaliMuridTableSeeder extends Seeder
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
                'nama_depan' => "Wali Murid 1",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
            [
                'nama_depan' => "Wali Murid 2",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
            [
                'nama_depan' => "Wali Murid 3",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
            [
                'nama_depan' => "Wali Murid 4",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
            [
                'nama_depan' => "Wali Murid 5",
                'nama_belakang' => $faker->lastName(),
                'nomor_telepon' => $faker->phoneNumber,
                'alamat_rumah' => $faker->address,
                'email' => $faker->unique()->safeEmail
            ],
        ];

        WaliMurid::insert($data);

        $data = WaliMurid::with('siswa')->get();

        $no = 1;
        foreach ($data as $item) {
            $item->siswa()->sync($no++);
        }
    }
}
