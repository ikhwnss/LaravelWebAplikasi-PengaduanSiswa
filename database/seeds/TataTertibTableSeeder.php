<?php

use App\TataTertib;
use Illuminate\Database\Seeder;

class TataTertibTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TataTertib::insert(
            [[
                'nama' => 'PAKAIAN SERAGAM',
                'detail' => '',
            ],
            [
                'nama' => 'RAMBUT, KUKU, TATO DAN MAKE-UP',
                'detail' => '',
            ],
            [
                'nama' => 'MASUK DAN PULANG SEKOLAH',
                'detail' => '',
            ],
            [
                'nama' => 'KEBERSIHAN,KEDISIPLINAN DAN KETERTIBAN',
                'detail' => '',
            ],
            [
                'nama' => 'SOPAN SANTUN PERGAULAN',
                'detail' => '',
            ],
            [
                'nama' => 'UPACARA BENDERA DAN PERINGATAN HARI-HARI BESAR',
                'detail' => '',
            ],

            [
                'nama' => 'KEGIATAN KEAGAMAAN',
                'detail' => '',
            ],

            [
                'nama' => 'LARANGAN-LARANGAN',
                'detail' => '',
            ],]
        );
    }
}
