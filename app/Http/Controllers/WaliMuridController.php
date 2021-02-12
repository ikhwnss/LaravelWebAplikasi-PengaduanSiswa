<?php

namespace App\Http\Controllers;

use App\WaliMurid;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class WaliMuridController extends Controller
{
    public function index()
    {
        (array) $data = array(
            'title' => 'Wali Murid',
            'data' => WaliMurid::all()
        );
        return view('pages.wali-murid.index', $data);
    }

    public function tambah()
    {
        (array) $data = array(
            'title' => 'Tambah Wali Murid'
        );
        return view('pages.wali-murid.tambah', $data);
    }

    public function detail()
    {
        (array) $data = array(
            'title' => 'Detail Wali Murid'
        );
        return view('pages.wali-murid.detail', $data);
    }


    public function edit(int $id)
    {
        (array) $data = array(
            'title' => 'Edit Wali Murid',
            'data' => WaliMurid::findOrFail($id)
        );
        return view('pages.wali-murid.edit', $data);
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'string|nullable',
            'nomor_telepon' => 'string|nullable',
            'alamat_rumah' => 'string|nullable',
            'email' => 'email|nullable'
        ]);

        $data = WaliMurid::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat_rumah' => $request->alamat_rumah,
            'email' => $request->email,
        ]);

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil disimpan",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('wali-murid.index'));
    }

    public function update(Request $request, int $id)
    {
        $validation = $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'string|nullable',
            'nomor_telepon' => 'string|nullable',
            'alamat_rumah' => 'string|nullable',
            'email' => 'email|nullable'
        ]);

        $data = WaliMurid::findOrFail($id);
        $data->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat_rumah' => $request->alamat_rumah,
            'email' => $request->email,
        ]);

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil diperbaharui",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect()->back();
    }

    public function delete(int $id)
    {
        $data = WaliMurid::findOrFail($id);
        $data->delete();

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('wali-murid.index'));
    }
}
