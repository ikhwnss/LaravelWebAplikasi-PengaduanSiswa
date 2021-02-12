<?php

namespace App\Http\Controllers\WaliMurid;

use App\Siswa;
use App\WaliMurid;
use App\KelasSiswa;
use App\TahunPelajaran;
use App\PelanggaranSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        if($request->id_tahun_pelajaran && $request->id_siswa)
        {
            $siswa = KelasSiswa::where('id_tahun_pelajaran', $request->id_tahun_pelajaran)
                                    ->where('id_siswa', $request->id_siswa)
                                    ->pluck('id_siswa');
            $rekap = PelanggaranSiswa::with('pelanggaran','siswa','guru','tanggapan')->whereIn('id_siswa', $siswa)->latest()->get();
            $siswa_submit = Siswa::where('id', $request->id_siswa)->first();
        } elseif (!$request->id_tahun_pelajaran && $request->id_siswa) {
            $rekap = PelanggaranSiswa::with('pelanggaran','siswa','guru','tanggapan')->where('id_siswa', $request->id_siswa)->latest()->get();
            $siswa_submit = Siswa::where('id', $request->id_siswa)->first();
        } else {
            $siswa_submit = null;
            $rekap = null;
        }
        // dd($rekap);

        $waliMurid = WaliMurid::where('id', auth()->user()->data_id)->with('siswa')->first();
        // $pelanggaran = PelanggaranSiswa::with('siswa','pelanggaran')
        //             ->whereIn('id_siswa', $waliMurid->siswa->pluck('id'))->get();
        (array) $data = [
            'title' => 'Rekap Pelanggaran Siswa Berdasarkan Siswa',
            'tahun_pelajaran' => TahunPelajaran::pluck('nama', 'id'),
            'siswa' => $waliMurid->siswa,
            'submit' => $request,
            'siswa_submit' => $siswa_submit ?? null,
            'rekap' => $rekap ?? null
        ];

        return view('pages-wali-murid.rekap.index', $data);
    }

    public function detail(int $id)
    {
        (array) $data = array(
            'title' => 'Detail Pelanggaran Siswa',
            'data' => PelanggaranSiswa::with('guru','pelanggaran','siswa')->findOrFail($id)
        );
        return view('pages-wali-murid.rekap.detail', $data);
    }
}
