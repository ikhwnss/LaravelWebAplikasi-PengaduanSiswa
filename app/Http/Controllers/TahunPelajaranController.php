<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\TahunPelajaran;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class TahunPelajaranController extends Controller
{
    public function index()
    {
        (array) $data = array(
            'title' => 'Tahun Pelajaran',
            'data' => TahunPelajaran::with('jurusan')->get()
        );
        return view('pages.tahun-pelajaran.index', $data);
    }

    public function tambah()
    {
        (array) $data = array(
            'title' => 'Tambah Tahun Pelajaran'
        );
        return view('pages.tahun-pelajaran.tambah', $data);
    }

    public function detail(int $id)
    {
        (array) $data = array(
            'title' => 'Detail Tahun Pelajaran',
            'data' => TahunPelajaran::with('jurusan')->findOrFail($id),
            'jurusan' => Jurusan::all()
        );
        return view('pages.tahun-pelajaran.detail', $data);
    }

    public function edit(int $id)
    {
        (array) $data = array(
            'title' => 'Edit Tahun Pelajaran',
            'data' => TahunPelajaran::with('jurusan')->findOrFail($id),
            'jurusan' => Jurusan::all()
        );
        return view('pages.tahun-pelajaran.edit', $data);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama' => 'required|string|max:255',
            // 'aktif'=> 'required|same:0'
        ]);

        $data = TahunPelajaran::create(
            [
                'nama' => $request->nama,
                // 'aktif'=> $request->aktif
            ]
        );

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil disimpan",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('tahun-pelajaran.index'));
    }

    public function update(Request $request,int $id)
    {
        $validation = $request->validate([
            'nama' => 'required|string|max:255',
            // 'aktif'=> 'required|same:0'
        ]);

        $data = TahunPelajaran::findOrFail($id);
        $data->update(
        [
            'nama' => $request->nama,
            // 'aktif'=> $request->aktif
        ]
        );

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil diperbaharui",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect()->back();
    }

    public function delete(int $id)
    {
        $data = TahunPelajaran::findOrFail($id);
        $data->delete();

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('tahun-pelajaran.index'));
    }

    public function jurusan(Request $request, int $id)
    {
        $data = TahunPelajaran::findOrFail($id);
        $data->jurusan()->sync($request->id_jurusan);

        if ($data instanceof Model) {
            toast("Data kelas pada tahun pelajaran $data->nama telah diperbaharui",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect()->back();
    }

    public function pilih()
    {
        (array) $data = [
            'title' => 'Pilih Tahun Pelajaran Aktif',
            'data' => TahunPelajaran::get(),
        ];
        return view('pages.tahun-pelajaran.pilih', $data);
    }

    public function pilihAksi(Request $request)
    {
        $validation = $request->validate(
            [
                'id_tahun_pelajaran' => 'required|exists:tahun_pelajaran,id'
            ]
        );

        TahunPelajaran::where('aktif', 1)->update(['aktif'=> 0]);
        $data = TahunPelajaran::findOrFail($request->id_tahun_pelajaran);
        $data->update(['aktif' => 1]);

        if ($data instanceof Model) {
            toast("Tahun Pelajaran $data->nama telah dipilih sebagai tahun pelajaran aktif",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect()->back();
    }
}

