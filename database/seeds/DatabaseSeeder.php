<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->deleteCurrent();
        $this->call(GuruTableSeeder::class);
        $this->call(SiswaTableSeeder::class);
        $this->call(WaliMuridTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TahunPelajaranTableSeeder::class);
        $this->call(JurusanTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(TataTertibTableSeeder::class);
        $this->call(PelanggaranTableSeeder::class);
        // $this->call(PelanggaranSiswaTableSeeder::class);
    }

    protected function deleteCurrent()
    {
        if(env('DB_CONNECTION') == 'mysql'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }
        // DB::table('pelanggaran_siswa')->truncate();
        DB::table('pelanggaran')->truncate();
        DB::table('tata_tertib')->truncate();
        DB::table('kelas')->truncate();
        DB::table('jurusan')->truncate();
        DB::table('tahun_pelajaran')->truncate();
        DB::table('users')->truncate();
        DB::table('wali_murid')->truncate();
        DB::table('siswa')->truncate();
        DB::table('guru')->truncate();
        if(env('DB_CONNECTION') == 'mysql'){
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
