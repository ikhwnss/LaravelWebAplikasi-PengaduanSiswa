<?php

use App\Guru;
use App\User;
use App\Siswa;
use App\WaliMurid;
use Faker\Generator;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $dataSiswa = Siswa::all();
        $dataGuru = Guru::all();
        $dataWaliMurid = WaliMurid::all();

        foreach ($dataSiswa as $item) {
            $userSiswa = User::create(
                [
                    'data_id' => $item->id,
                    'role' => 'siswa',
                    'name' => "$item->nama_depan $item->nama_belakang",
                    'username' => $item->nis,
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                ]
            );
        }

        foreach ($dataGuru as $item) {
            $userGuru = User::create(
                [
                    'data_id' => $item->id,
                    'role' => 'guru',
                    'name' => "$item->nama_depan $item->nama_belakang",
                    'username' => $item->nip,
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                ]
            );
        }

        foreach ($dataWaliMurid as $item) {
            $userWaliMurid = User::create(
                [
                    'data_id' => $item->id,
                    'role' => 'wali_murid',
                    'name' => "$item->nama_depan $item->nama_belakang",
                    'username' => Str::random(6),
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                ]
            );
        }
    }
}
