<?php

namespace App\Http\Controllers;

use App\TataTertib;
use App\Pelanggaran;
use Illuminate\Http\Request;
use App\Imports\PelanggaranImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;

class PelanggaranController extends Controller
{
    public function index()
    {
        (array) $data = array(
            'title' => 'Pelanggaran',
            'data' => Pelanggaran::with('tataTertib')->get()
        );
        return view('pages.pelanggaran.index', $data);
    }

    public function tambah()
    {
        (array) $data = array(
            'title' => 'Tambah Pelanggaran',
            'collection' => TataTertib::pluck('nama','id')
        );
        return view('pages.pelanggaran.tambah', $data);
    }

    public function detail(int $id)
    {
        (array) $data = array(
            'title' => 'Detail Pelanggaran',
            'data' => Pelanggaran::with('tataTertib')->findOrFail($id)
        );
        return view('pages.pelanggaran.detail', $data);
    }

    public function edit(int $id)
    {
        (array) $data = array(
            'title' => 'Edit Pelanggaran',
            'data' => Pelanggaran::findOrFail($id),
            'collection' => TataTertib::pluck('nama','id'),
        );
        return view('pages.pelanggaran.edit', $data);
    }

    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'id_tata_tertib' => 'required|integer|exists:tata_tertib,id',
                'nama' => 'required|string',
                'detail' => 'string|nullable',
                'poin' => 'required|integer',
                'kategori' => 'nullable|string|in:ringan,sedang,berat',
                'sanksi' => 'nullable|string',
            ]
        );

        $data = Pelanggaran::create(
            [
                'id_tata_tertib' => $request->id_tata_tertib,
                'nama' => $request->nama,
                'detail' => $request->detail,
                'poin'=> $request->poin,
                'kategori' => $request->kategori,
                'sanksi' => $request->sanksi,
            ]
        );

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil disimpan",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('pelanggaran.index'));
    }

    public function update(Request $request, int $id)
    {
        $validation = $request->validate(
            [
                'id_tata_tertib' => 'required|integer|exists:tata_tertib,id',
                'nama' => 'required|string',
                'detail' => 'string|nullable',
                'poin' => 'required|integer',
                'kategori' => 'nullable|string|in:ringan,sedang,berat',
                'sanksi' => 'nullable|string',
            ]
        );

        $data = Pelanggaran::findOrFail($id);
        $data->update(
            [
                'id_tata_tertib' => $request->id_tata_tertib,
                'nama' => $request->nama,
                'detail' => $request->detail,
                'poin'=> $request->poin,
                'kategori' => $request->kategori,
                'sanksi' => $request->sanksi,
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
        $data = Pelanggaran::findOrFail($id);
        $data->delete();

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('pelanggaran.index'));
    }

    public function upload()
   {
       return view('pages.pelanggaran.upload');
   }
   public function uploadAction(Request $request)
   {
       $request->validate([
           'excel' => 'required|file',
       ]);
       $data = Excel::import(new PelanggaranImport, $request->file('excel'), null, \Maatwebsite\Excel\Excel::XLSX);
       if ($data) {
           toast("Data berhasil disimpan",'success');
       } else {
           toast("Terjadi Kesalahan",'error');
       }
       return redirect()->back();
   }
   public function download()
   {
       return response()->download('assets/excel/pelanggaran.xlsx', 'pelanggaran.xlsx');
   }
}
