<?php

use App\Jurusan;
use App\Kelas;
use App\KelasSiswa;
use App\Siswa;
use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (array) $data = [
            [
                'id_jurusan'    => '1',
                'nama'          => 'X RPL 1',
                'detail'        => ''
            ],
            [
                'id_jurusan'    => '1',
                'nama'          => 'X RPL 2',
                'detail'        => ''
            ],
            [
                'id_jurusan'    => '1',
                'nama'          => 'X RPL 3',
                'detail'        => ''
            ],
            [
                'id_jurusan'    => '1',
                'nama'          => 'XI RPL 1',
                'detail'        => ''
            ],
            [
                'id_jurusan'    => '1',
                'nama'          => 'XI RPL 2',
                'detail'        => ''
            ],
            [
                'id_jurusan'    => '1',
                'nama'          => 'XI RPL 3',
                'detail'        => ''
            ],
            [
                'id_jurusan'    => '1',
                'nama'          => 'XII RPL 1',
                'detail'        => ''
            ],
            [
                'id_jurusan'    => '1',
                'nama'          => 'XII RPL 2',
                'detail'        => ''
            ],
            [
                'id_jurusan'    => '1',
                'nama'          => 'XII RPL 3',
                'detail'        => ''
            ],
        ];

        $kelas = Kelas::insert($data);

        $kelas_siswa = KelasSiswa::insert([
            [
                'id_tahun_pelajaran' => 1,
                'id_kelas' => 1,
                'id_siswa' => 1
            ],
            [
                'id_tahun_pelajaran' => 1,
                'id_kelas' => 1,
                'id_siswa' => 2
            ],
            [
                'id_tahun_pelajaran' => 1,
                'id_kelas' => 1,
                'id_siswa' => 3
            ],
            [
                'id_tahun_pelajaran' => 1,
                'id_kelas' => 1,
                'id_siswa' => 4
            ],
            [
                'id_tahun_pelajaran' => 1,
                'id_kelas' => 1,
                'id_siswa' => 5
            ],
        ]);
    }
}
