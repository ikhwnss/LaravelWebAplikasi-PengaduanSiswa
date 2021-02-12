<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->group(function(){
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('profil', 'ProfilController@index')->name('profil.index');
        Route::get('profil/edit', 'ProfilController@edit')->name('profil.edit');
        Route::post('profil', 'ProfilController@update')->name('profil.update');


        Route::group(['middleware' => ['siswa']], function () {
            Route::get('siswa/wali-murid', 'Siswa\WaliMuridController@index')->name('siswa.wali-murid.index');
            Route::get('siswa/rekap', 'Siswa\RekapController@index')->name('siswa.rekap.index');
        });

        Route::group(['middleware' => ['wali']], function () {
            Route::get('wali-murid/siswa', 'WaliMurid\SiswaController@index')->name('wali-murid.siswa.index');
            Route::get('wali-murid/rekap', 'WaliMurid\RekapController@index')->name('wali-murid.rekap.index');
            Route::get('wali-murid/rekap/{id}/detail', 'WaliMurid\RekapController@detail')->name('wali-murid.rekap.detail');
            Route::get('wali-murid/rekap/{id}/tambah', 'WaliMurid\TanggapanController@tambah')->name('wali-murid.tanggapan.tambah');
            Route::get('wali-murid/rekap/{id}/{id_tanggapan}/edit', 'WaliMurid\TanggapanController@edit')->name('wali-murid.tanggapan.edit');
            Route::post('wali-murid/rekap/{id}/store', 'WaliMurid\TanggapanController@store')->name('wali-murid.tanggapan.store');
            Route::post('wali-murid/rekap/{id}/{id_tanggapan}', 'WaliMurid\TanggapanController@update')->name('wali-murid.tanggapan.update');
            Route::delete('wali-murid/rekap/{id}/{id_tanggapan}', 'WaliMurid\TanggapanController@delete')->name('wali-murid.tanggapan.delete');
        });

        Route::group(['middleware' => ['guru']], function () {
            Route::get('pengguna', 'PenggunaController@index')->name('pengguna.index');
            Route::get('pengguna/tambah', 'PenggunaController@generate')->name('pengguna.generate');
            Route::post('pengguna/tambah', 'PenggunaController@generateAction')->name('pengguna.generate.aksi');
            Route::delete('pengguna/{id}', 'PenggunaController@delete')->name('pengguna.delete');
            Route::get('pengguna/{id}', 'PenggunaController@reset')->name('pengguna.reset');
            Route::get('jurusan', 'JurusanController@index')->name('jurusan.index');
            Route::get('jurusan/tambah', 'JurusanController@tambah')->name('jurusan.tambah');
            Route::get('jurusan/detail', 'JurusanController@detail')->name('jurusan.detail');
            Route::get('jurusan/{id}/edit', 'JurusanController@edit')->name('jurusan.edit');
            Route::post('jurusan/store', 'JurusanController@store')->name('jurusan.store');
            Route::post('jurusan/{id}', 'JurusanController@update')->name('jurusan.update');
            Route::delete('jurusan/{id}', 'JurusanController@delete')->name('jurusan.delete');
            Route::get('tahun-pelajaran', 'TahunPelajaranController@index')->name('tahun-pelajaran.index');
            Route::get('tahun-pelajaran/pilih', 'TahunPelajaranController@pilih')->name('tahun-pelajaran.pilih');
            Route::post('tahun-pelajaran/pilih/aksi', 'TahunPelajaranController@pilihAksi')->name('tahun-pelajaran.pilih.aksi');
            Route::get('tahun-pelajaran/tambah', 'TahunPelajaranController@tambah')->name('tahun-pelajaran.tambah');
            Route::get('tahun-pelajaran/detail', 'TahunPelajaranController@detail')->name('tahun-pelajaran.detail');
            Route::get('tahun-pelajaran/{id}/edit', 'TahunPelajaranController@edit')->name('tahun-pelajaran.edit');
            Route::post('tahun-pelajaran/store', 'TahunPelajaranController@store')->name('tahun-pelajaran.store');
            Route::post('tahun-pelajaran/{id}', 'TahunPelajaranController@update')->name('tahun-pelajaran.update');
            Route::delete('tahun-pelajaran/{id}', 'TahunPelajaranController@delete')->name('tahun-pelajaran.delete');
            Route::get('tahun-pelajaran/{id}', 'TahunPelajaranController@detail')->name('tahun-pelajaran.detail');
            Route::post('tahun-pelajaran/{id}/jurusan', 'TahunPelajaranController@jurusan')->name('tahun-pelajaran.jurusan');
            Route::get('siswa', 'SiswaController@index')->name('siswa.index');
            Route::get('siswa/tambah', 'SiswaController@tambah')->name('siswa.tambah');
            Route::get('siswa/upload', 'SiswaController@upload')->name('siswa.upload');
            Route::post('siswa/upload/action', 'SiswaController@uploadAction')->name('siswa.upload.action');
            Route::get('siswa/download', 'SiswaController@download')->name('siswa.download');
            Route::get('siswa/detail', 'SiswaController@detail')->name('siswa.detail');
            Route::get('siswa/{id}/edit', 'SiswaController@edit')->name('siswa.edit');
            Route::post('siswa/{id}/wali-murid', 'SiswaController@waliMuridTambah')->name('siswa.wali_murid.tambah');
            Route::get('siswa/{id}/wali-murid', 'SiswaController@waliMurid')->name('siswa.wali_murid');
            Route::delete('siswa/{id}/wali-murid/{id_wali_murid}', 'SiswaController@waliMuridHapus')->name('siswa.wali_murid.hapus');
            Route::post('siswa/store', 'SiswaController@store')->name('siswa.store');
            Route::post('siswa/{id}', 'SiswaController@update')->name('siswa.update');
            Route::delete('siswa/{id}', 'SiswaController@delete')->name('siswa.delete');
            Route::get('wali-murid', 'WaliMuridController@index')->name('wali-murid.index');
            Route::get('wali-murid/tambah', 'WaliMuridController@tambah')->name('wali-murid.tambah');
            Route::get('wali-murid/detail', 'WaliMuridController@detail')->name('wali-murid.detail');
            Route::get('wali-murid/{id}/edit', 'WaliMuridController@edit')->name('wali-murid.edit');
            Route::post('wali-murid/store', 'WaliMuridController@store')->name('wali-murid.store');
            Route::post('wali-murid/{id}', 'WaliMuridController@update')->name('wali-murid.update');
            Route::delete('wali-murid/{id}', 'WaliMuridController@delete')->name('wali-murid.delete');
            Route::get('guru', 'GuruController@index')->name('guru.index');
            Route::get('guru/tambah', 'GuruController@tambah')->name('guru.tambah');
            Route::get('guru/upload', 'GuruController@upload')->name('guru.upload');
            Route::post('guru/upload/action', 'GuruController@uploadAction')->name('guru.upload.action');
            Route::get('guru/download', 'GuruController@download')->name('guru.download');
            Route::get('guru/detail', 'GuruController@detail')->name('guru.detail');
            Route::get('guru/{id}/edit', 'GuruController@edit')->name('guru.edit');
            Route::post('guru/store', 'GuruController@store')->name('guru.store');
            Route::post('guru/{id}', 'GuruController@update')->name('guru.update');
            Route::delete('guru/{id}', 'GuruController@delete')->name('guru.delete');
            Route::get('kelas', 'KelasController@index')->name('kelas.index');
            Route::get('kelas/tambah', 'KelasController@tambah')->name('kelas.tambah');
            Route::get('kelas/{id}', 'KelasController@detail')->name('kelas.detail');
            Route::get('kelas/{id}/edit', 'KelasController@edit')->name('kelas.edit');
            Route::get('kelas/{id}/siswa', 'KelasController@siswa')->name('kelas.siswa');
            Route::post('kelas/{id}/siswa', 'KelasController@siswaTambah')->name('kelas.siswa.tambah');
            Route::delete('kelas/{id}/siswa/{id_siswa}', 'KelasController@siswaHapus')->name('kelas.siswa.hapus');
            Route::post('kelas/store', 'KelasController@store')->name('kelas.store');
            Route::post('kelas/{id}', 'KelasController@update')->name('kelas.update');
            Route::delete('kelas/{id}', 'KelasController@delete')->name('kelas.delete');
            Route::get('tata-tertib', 'TataTertibController@index')->name('tata_tertib.index');
            Route::get('tata-tertib/tambah', 'TataTertibController@tambah')->name('tata_tertib.tambah');
            Route::get('tata-tertib/{id}/detail', 'TataTertibController@detail')->name('tata_tertib.detail');
            Route::get('tata-tertib/{id}/edit', 'TataTertibController@edit')->name('tata_tertib.edit');
            Route::post('tata-tertib/store', 'TataTertibController@store')->name('tata_tertib.store');
            Route::post('tata-tertib/{id}', 'TataTertibController@update')->name('tata_tertib.update');
            Route::delete('tata-tertib/{id}', 'TataTertibController@delete')->name('tata_tertib.delete');
            Route::get('pelanggaran', 'PelanggaranController@index')->name('pelanggaran.index');
            Route::get('pelanggaran/tambah', 'PelanggaranController@tambah')->name('pelanggaran.tambah');
            Route::get('pelanggaran/upload', 'PelanggaranController@upload')->name('pelanggaran.upload');
            Route::post('pelanggaran/upload/action', 'PelanggaranController@uploadAction')->name('pelanggaran.upload.action');
            Route::get('pelanggaran/download', 'PelanggaranController@download')->name('pelanggaran.download');
            Route::get('pelanggaran/{id}/detail', 'PelanggaranController@detail')->name('pelanggaran.detail');
            Route::get('pelanggaran/{id}/edit', 'PelanggaranController@edit')->name('pelanggaran.edit');
            Route::post('pelanggaran/store', 'PelanggaranController@store')->name('pelanggaran.store');
            Route::post('pelanggaran/{id}', 'PelanggaranController@update')->name('pelanggaran.update');
            Route::delete('pelanggaran/{id}', 'PelanggaranController@delete')->name('pelanggaran.delete');
            Route::get('pelanggaran-siswa', 'PelanggaranSiswaController@index')->name('pelanggaran_siswa.index');
            Route::get('pelanggaran-siswa/tambah', 'PelanggaranSiswaController@tambah')->name('pelanggaran_siswa.tambah');
            Route::any('pelanggaran-siswa/kelas', 'PelanggaranSiswaController@kelas')->name('pelanggaran_siswa.kelas');
            Route::any('pelanggaran-siswa/siswa', 'PelanggaranSiswaController@siswa')->name('pelanggaran_siswa.siswa');
            Route::get('pelanggaran-siswa/{id}/detail', 'PelanggaranSiswaController@detail')->name('pelanggaran_siswa.detail');
            Route::get('pelanggaran-siswa/{id}/tanggapan', 'PelanggaranSiswaController@tanggapan')->name('pelanggaran_siswa.tanggapan');
            Route::get('pelanggaran-siswa/{id}/edit', 'PelanggaranSiswaController@edit')->name('pelanggaran_siswa.edit');
            Route::post('pelanggaran-siswa/store', 'PelanggaranSiswaController@store')->name('pelanggaran_siswa.store');
            Route::post('pelanggaran-siswa/{id}', 'PelanggaranSiswaController@update')->name('pelanggaran_siswa.update');
            Route::delete('pelanggaran-siswa/{id}', 'PelanggaranSiswaController@delete')->name('pelanggaran_siswa.delete');
        });


    });
});
