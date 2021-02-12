<?php

use App\Pelanggaran;
use Illuminate\Database\Seeder;

class PelanggaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelanggaran::insert(
            [
                [
                    'id_tata_tertib' => 1,
                    'nama' => 'Tidak mengenakan seragam sekolah yang telah ditentukan (pakaian, sepatu, dasi, setangan leher/hasduk, kaos kaki, jilbab, dalaman penutup kepala bagi perempuan, sabuk dan topi).',
                    'detail' => '',
                    'poin' => 3,
                    'kategori' => 'ringan',
                    'sanksi' => 'Bimbingan'
                ],
                [
                    'id_tata_tertib' => 1,
                    'nama' => 'Tidak mengenakan pakaian olah raga yang telah ditentukan atau mencorat-coretnya.',
                    'detail' => '',
                    'poin' => 3,
                    'kategori' => 'ringan',
                    'sanksi' => 'Bimbingan'
                ],
                [
                    'id_tata_tertib' => 2,
                    'nama' => 'Berambut gondrong(1/5 cm dibawah, 1 cm di pinggir, 3 cm diatas), gundul atau  mecukur yang tidak sesuai dengan ketentuan bagi laki-laki.',
                    'detail' => '',
                   'poin' => 5,
                    'kategori' => 'ringan',
                    'sanksi' => 'Bimbingan'
                ],
                [
                    'id_tata_tertib' => 2,
                    'nama' => 'Memakai aksesoris yang tidak   mencerminkan pribadi siswa (siswa laki-laki memakai kalung, anting-anting, gelang, cincin, siswa perempuan memakai perhiasan serta make-up yang berlebihan).',
                    'detail' => '',
                    'poin' => 5,
                    'kategori' => 'ringan',
                    'sanksi' => 'Bimbingan'
                ],

                [
                    'id_tata_tertib' => 2,
                    'nama' => 'Mengecat rambut.',
                    'detail' => '',
                    'poin' => 5,
                    'kategori' => 'ringan',
                    'sanksi' => 'Bimbingan'
                ],

                [
                    'id_tata_tertib' => 2,
                    'nama' => 'Bertato (permanen).',
                    'detail' => '',
                    'poin' => 5,
                    'kategori' => 'ringan',
                    'sanksi' => 'Bimbingan'
                ],
                [
                    'id_tata_tertib' => 2,
                    'nama' => 'Berkuku panjang dan mengecat kuku.',
                    'detail' => '',
                    'poin' => 5,
                    'kategori' => 'ringan',
                    'sanksi' => 'Bimbingan'
                ],
            ]
        );
    }
}
