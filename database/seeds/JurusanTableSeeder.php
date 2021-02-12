<?php

use App\Jurusan;
use App\TahunPelajaran;
use Illuminate\Database\Seeder;

class JurusanTableSeeder extends Seeder
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
                'nama' => 'RPL',
                'detail' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'nama' => 'TL',
                'detail' => 'Teknik Las'
            ],
            [
                'nama' => 'BB',
                'detail' => 'Busana Butik'
            ],
            [
                'nama' => 'TSM',
                'detail' => 'Teknik Sepeda Motor'
            ],
            [
                'nama' => 'JB',
                'detail' => 'Jasa Boga'
            ]
        ];

        Jurusan::insert($data);

        $tahunPelajaran = TahunPelajaran::findOrFail(1);
        $tahunPelajaran->jurusan()->sync([1,2,3,4,5]);
    }
}
