<?php

use App\TahunPelajaran;
use Illuminate\Database\Seeder;

class TahunPelajaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year = date('Y');
        $yearPlusOne = $year+1;
        (array) $array = array(
            ['nama' => $year++.'/'.$yearPlusOne++, 'aktif' => 1],
            ['nama' => $year++.'/'.$yearPlusOne++, 'aktif' => 0],
            ['nama' => $year++.'/'.$yearPlusOne++, 'aktif' => 0],
            ['nama' => $year++.'/'.$yearPlusOne++, 'aktif' => 0],
            ['nama' => $year++.'/'.$yearPlusOne++, 'aktif' => 0],
            ['nama' => $year++.'/'.$yearPlusOne++, 'aktif' => 0],
            ['nama' => $year++.'/'.$yearPlusOne++, 'aktif' => 0],
            ['nama' => $year++.'/'.$yearPlusOne++, 'aktif' => 0],
            ['nama' => $year++.'/'.$yearPlusOne++, 'aktif' => 0],
            ['nama' => $year++.'/'.$yearPlusOne++, 'aktif' => 0],
            ['nama' => $year++.'/'.$yearPlusOne++, 'aktif' => 0],
        );

        TahunPelajaran::insert($array);
    }
}
