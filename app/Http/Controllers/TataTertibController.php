<?php

namespace App\Http\Controllers;

use App\TataTertib;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TataTertibController extends Controller
{
    public function index()
    {
        (array) $data = array(
            'title' => 'Tata Tertib',
            'data' => TataTertib::all()
        );
        return view('pages.tata-tertib.index', $data);
    }

    public function tambah()
    {
        (array) $data = array(
            'title' => 'Tambah Tata Tertib'
        );
        return view('pages.tata-tertib.tambah', $data);
    }

    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'nama' => 'required|string|max:255',
                'detail' => 'string|nullable'
            ]
        );

        $data = TataTertib::create([
            'nama' => $request->nama,
            'detail' => $request->detail,
        ]);

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil disimpan",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('tata_tertib.index'));
    }

    public function detail(int $id)
    {
        (array) $data = array(
            'title' => 'Detail Tata Tertib',
            'tata_tertib' => TataTertib::findOrFail($id)
        );
        return view('pages.tata-tertib.detail', $data);
    }

    public function edit(int $id)
    {
        (array) $data = array(
            'title' => 'Edit TataTertib',
            'data' => TataTertib::findOrFail($id)
        );
        return view('pages.tata-tertib.edit', $data);
    }

    public function update(Request $request, int $id)
    {
        $validation = $request->validate([
            'nama' => 'required|string|max:255',
            'detail' => 'string|nullable'
        ]);

        $data = TataTertib::findOrFail($id);
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
        $data = TataTertib::findOrFail($id);
        $data->delete();

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('tata_tertib.index'));
    }
}
