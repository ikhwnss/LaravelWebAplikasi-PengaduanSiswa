<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\WaliMurid;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

    class SiswaController extends Controller
{
    public function index()
    {
        (array) $data = array(
            'title' => 'Siswa',
            'data' => Siswa::with('waliMurid')->get()
        );
        return view('pages.siswa.index', $data);
    }

    public function tambah()
    {
        (array) $data = array(
            'title' => 'Tambah Siswa'
        );
        return view('pages.siswa.tambah', $data);
    }

    public function detail()
    {
        (array) $data = array(
            'title' => 'Detail Siswa'
        );
        return view('pages.siswa.detail', $data);
    }


    public function edit(int $id)
    {
        (array) $data = array(
            'title' => 'Edit Siswa',
            'data' => Siswa::findOrFail($id)
        );
        return view('pages.siswa.edit', $data);
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'string|nullable',
            'nis' => 'required|string|max:255',
            'nomor_telepon' => 'string|nullable',
            'alamat_rumah' => 'string|nullable',
            'email' => 'email|nullable'
        ]);

        $data = Siswa::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nis' => $request->nis,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat_rumah' => $request->alamat_rumah,
            'email' => $request->email,
        ]);

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil disimpan",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('siswa.index'));
    }

    public function update(Request $request, int $id)
    {
        $validation = $request->validate([
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'string|nullable',
            'nis' => 'required|string|max:255',
            'nomor_telepon' => 'string|nullable',
            'alamat_rumah' => 'string|nullable',
            'email' => 'email|nullable'
        ]);

        $data = Siswa::findOrFail($id);
        $data->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nis' => $request->nis,
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
        $data = Siswa::findOrFail($id);
        $data->delete();

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('siswa.index'));
    }

    public function waliMurid(int $id)
    {
        $siswa = Siswa::with('waliMurid')->findOrFail($id);
        $wali_murid = WaliMurid::whereNotIn('id', $siswa->waliMurid->pluck('id'))->get();
        (array) $data = [
            'siswa' => $siswa,
            'title' => "Wali Murid Untuk Siswa: $siswa->nama",
            'wali_murid' => $wali_murid
        ];
        // dd($data['wali_murid']);
        return view('pages.siswa.wali-murid', $data);
    }

    public function waliMuridTambah(Request $request, int $id)
    {
        $siswa = Siswa::findOrFail($id);
        $wali_murid = $request->wali_murid;
        $siswa->waliMurid()->syncWithoutDetaching($wali_murid);

        if ($siswa) {
            toast("Data berhasil dimasukkan",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect()->back();
    }

    public function waliMuridHapus(int $id, int $id_wali_murid)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->waliMurid()->detach($id_wali_murid);

        if ($siswa) {
            toast("Data berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect()->back();
    }

    public function upload()
   {
       return view('pages.siswa.upload');
   }
   public function uploadAction(Request $request)
   {
       $request->validate([
           'excel' => 'required|file',
       ]);
       $data = Excel::import(new SiswaImport, $request->file('excel'), null, \Maatwebsite\Excel\Excel::XLSX);
       if ($data) {
           toast("Data berhasil disimpan",'success');
       } else {
           toast("Terjadi Kesalahan",'error');
       }
       return redirect()->back();
   }
   public function download()
   {
       return response()->download('assets/excel/siswa.xlsx', 'siswa.xlsx');
   }
}
