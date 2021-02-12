<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        (array) $data = array(
            'title' => 'Jurusan',
            'data' => Jurusan::all()
        );
        return view('pages.jurusan.index', $data);
    }

    public function tambah()
    {
        (array) $data = array(
            'title' => 'Tambah Jurusan'
        );
        return view('pages.jurusan.tambah', $data);
    }

    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'nama' => 'required|string|max:255',
                'detail' => 'string|nullable'
            ]
        );

        $data = Jurusan::create([
            'nama' => $request->nama,
            'detail' => $request->detail,
        ]);

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil disimpan",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('jurusan.index'));
    }

    public function detail()
    {
        (array) $data = array(
            'title' => 'Detail Jurusan'
        );
        return view('pages.jurusan.detail', $data);
    }

    public function edit(int $id)
    {
        (array) $data = array(
            'title' => 'Edit Jurusan',
            'data' => Jurusan::findOrFail($id)
        );
        return view('pages.jurusan.edit', $data);
    }

    public function update(Request $request, int $id)
    {
        $validation = $request->validate([
            'nama' => 'required|string|max:255',
            'detail' => 'string|nullable'
        ]);

        $data = Jurusan::findOrFail($id);
        $data->update(
            [
                'nama' => $request->nama,
                'detail' => $request->detail,
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
        $data = Jurusan::findOrFail($id);
        $data->delete();

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('jurusan.index'));
    }
}
