<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Imports\GuruImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;

class GuruController extends Controller
{
    public function index()
    {
        (array) $data = array(
            'title' => 'Guru',
            'data' => Guru::all()
        );
        return view('pages.guru.index', $data);
    }

    public function tambah()
    {
        (array) $data = array(
            'title' => 'Tambah Guru'
        );
        return view('pages.guru.tambah', $data);
    }

    public function detail()
    {
        (array) $data = array(
            'title' => 'Detail Guru'
        );
        return view('pages.guru.detail', $data);
    }

    public function edit(int $id)
    {
        (array) $data = array(
            'title' => 'Edit Guru',
            'data' => Guru::findOrFail($id)
        );
        return view('pages.guru.edit', $data);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'string|nullable',
            'kode_guru' => 'required|string|max:255',
            'nomor_telepon' => 'string|nullable',
            'alamat_rumah' => 'string|nullable',
            'email' => 'email|nullable'
        ]);

        $data = Guru::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'kode_guru' => $request->kode_guru,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat_rumah' => $request->alamat_rumah,
            'email' => $request->email,
        ]);

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil disimpan",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('guru.index'));
    }

    public function update(Request $request, int $id)
    {
        $validation = $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'string|nullable',
            'kode_guru' => 'required|string|max:255',
            'nomor_telepon' => 'string|nullable',
            'alamat_rumah' => 'string|nullable',
            'email' => 'email|nullable'
        ]);

        $data = Guru::findOrFail($id);
        $data->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'kode_guru' => $request->kode_guru,
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
        $data = Guru::findOrFail($id);
        $data->delete();

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('guru.index'));
    }
    public function upload()
   {
       return view('pages.guru.upload');
   }
   public function uploadAction(Request $request)
   {
       $request->validate([
           'excel' => 'required|file',
       ]);
       $data = Excel::import(new GuruImport, $request->file('excel'), null, \Maatwebsite\Excel\Excel::XLSX);
       if ($data) {
           toast("Data berhasil disimpan",'success');
       } else {
           toast("Terjadi Kesalahan",'error');
       }
       return redirect()->back();
   }
   public function download()
   {
       return response()->download('assets/excel/guru.xlsx', 'guru.xlsx');
   }

}
