<?php

namespace App\Http\Controllers\Siswa;

use App\PelanggaranSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekapController extends Controller
{
    public function index()
    {
        $pelanggaran = PelanggaranSiswa::with('siswa','pelanggaran')
                    ->where('id_siswa', auth()->user()->data_id)->get();
        (array) $data = [
            'title' => 'Rekap Pelanggaran Yang Pernah Dilakukan',
            'rekap' => $pelanggaran,
        ];

        return view('pages-siswa.rekap.index', $data);
    }
}
