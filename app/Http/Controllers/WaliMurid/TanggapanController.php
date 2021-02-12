<?php

namespace App\Http\Controllers\WaliMurid;

use App\PelanggaranSiswa;
use App\TanggapanWaliMurid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class TanggapanController extends Controller
{
    public function index()
    {
        (array) $data = array(
            'title' => 'Tanggapan',
        );
        return view('pages-wali-murid.tanggapan.index', $data);
    }

    public function tambah(int $id)
    {
        (array) $data = array(
            'title' => 'Tambah Tanggapan',
            'pelanggaran' => PelanggaranSiswa::findOrFail($id),
        );
        return view('pages-wali-murid.tanggapan.tambah', $data);
    }

    public function store(Request $request, int $id)
    {
        $request->validate([
            'tanggapan' => 'string|nullable'
        ]);

        $data = TanggapanWaliMurid::create([
            'id_wali_murid' => auth()->user()->data_id,
            'id_pelanggaran_siswa' => $id,
            'tanggapan' => $request->tanggapan
        ]);

        if ($data instanceof Model) {
            toast("Data $data->tanggapan berhasil disimpan",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('wali-murid.rekap.index'));
    }

    public function detail()
    {

    }

    public function edit(int $id, int $id_tanggapan)
    {
        (array) $data = array(
            'title' => 'Tambah Tanggapan',
            'pelanggaran' => PelanggaranSiswa::findOrFail($id),
            'tanggapan' => TanggapanWaliMurid::findOrFail($id_tanggapan)
        );
        return view('pages-wali-murid.tanggapan.edit', $data);
    }

    public function update(Request $request, int $id, int $id_tanggapan)
    {
        $request->validate([
            'tanggapan' => 'string|nullable'
        ]);

        $data = TanggapanWaliMurid::findOrFail($id_tanggapan);
        $data->update([
            'id_wali_murid' => auth()->user()->data_id,
            'id_pelanggaran_siswa' => $id,
            'tanggapan' => $request->tanggapan
        ]);

        if ($data instanceof Model) {
            toast("Data $data->tanggapan berhasil diperbaharui",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect()->back();
    }

    public function delete(int $id, int $id_tanggapan)
    {
        $data = TanggapanWaliMurid::findOrFail($id_tanggapan);
        $data->delete();

        if ($data instanceof Model) {
            toast("Data $data->tanggapan berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        // return redirect();
    }
}
