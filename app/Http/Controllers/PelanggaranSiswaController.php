<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Kelas;
use App\Siswa;
use App\KelasSiswa;
use App\Pelanggaran;
use App\TahunPelajaran;
use App\PelanggaranSiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class PelanggaranSiswaController extends Controller
{
    public function index()
    {
        (array) $data = array(
            'title' => 'Pelanggaran Siswa Terbaru',
            'data' => PelanggaranSiswa::with('guru','siswa','pelanggaran','tanggapan')->latest()->get()
        );
        // dd($data['data']);
        return view('pages.pelanggaran-siswa.index', $data);
    }


    public function tambah()
    {
        (array) $data = array(
            'title' => 'Tambah Pelanggaran Siswa',
            'guru' => Guru::all(),
            'siswa' => Siswa::all(),
            'pelanggaran' => Pelanggaran::pluck('nama','id')
        );
        return view('pages.pelanggaran-siswa.tambah', $data);
    }

    public function kelas(Request $request)
    {
        if($request->id_tahun_pelajaran && $request->id_kelas)
        {
            $siswa = KelasSiswa::where('id_tahun_pelajaran', $request->id_tahun_pelajaran)
                                    ->where('id_kelas', $request->id_kelas)
                                    ->pluck('id_siswa');
            $rekap = PelanggaranSiswa::with('pelanggaran','siswa','guru','tanggapan')->whereIn('id_siswa', $siswa)->latest()->get();
        } else {
            $rekap = null;
        }

        (array) $data = array(
            'title' => 'Rekap Pelanggaran Siswa Berdasarkan Kelas',
            'tahun_pelajaran' => TahunPelajaran::pluck('nama','id'),
            'kelas' => Kelas::pluck('nama','id'),
            'submit' => $request,
            'rekap' => $rekap ?? null
        );
        return view('pages.pelanggaran-siswa.kelas', $data);
    }

    public function siswa(Request $request)
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

        (array) $data = array(
            'title' => 'Rekap Pelanggaran Siswa Berdasarkan Siswa',
            'tahun_pelajaran' => TahunPelajaran::pluck('nama', 'id'),
            'siswa' => Siswa::all(),
            'submit' => $request,
            'siswa_submit' => $siswa_submit ?? null,
            'rekap' => $rekap ?? null
        );
        return view('pages.pelanggaran-siswa.siswa', $data);
    }

    public function detail(int $id)
    {
        (array) $data = array(
            'title' => 'Detail Pelanggaran Siswa',
            'data' => PelanggaranSiswa::with('siswa','guru','pelanggaran')->findOrFail($id)
        );
        return view('pages.pelanggaran-siswa.detail', $data);
    }

    public function edit(int $id)
    {
        (array) $data = array(
            'title' => 'Edit Pelanggaran Siswa',
            'data' => PelanggaranSiswa::findOrFail($id),
            'guru' => Guru::all(),
            'siswa' => Siswa::all(),
            'pelanggaran' => Pelanggaran::pluck('nama','id')
        );
        return view('pages.pelanggaran-siswa.edit', $data);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg',
            'tindak_lanjut' => 'nullable|in:0,1',
            'id_guru' => 'required|integer|exists:guru,id',
            'id_siswa' => 'required|integer|exists:siswa,id',
            'id_pelanggaran' => 'required|integer|exists:pelanggaran,id',
            'hasil_konseling' => 'string|nullable',
            'tanggal_pelanggaran' => 'required',
            'tanggal_konseling' => 'nullable',

        ]);

        if($request->file('foto') !== null)
        {
            // menyimpan data foto yang diupload ke variabel $file
            $file = $request->file('foto');

            $nama_file = Str::slug(auth()->user()->name)."-".time().'.'.$file->getClientOriginalExtension();

              // isi dengan nama folder tempat kemana file diupload
            $file->move('assets/img/pelanggaran',$nama_file);
            $url_file = 'assets/img/pelanggaran/'.$nama_file;

        } else {
            $url_file = null;
        }

        $data = PelanggaranSiswa::create(
            [
                'foto' => $url_file,
                'tindak_lanjut' => $request->tindak_lanjut,
                'id_siswa' => $request->id_siswa,
                'id_guru' => $request->id_guru,
                'id_pelanggaran'=> $request->id_pelanggaran,
                'hasil_konseling'=> $request->hasil_konseling,
                'tanggal_pelanggaran'=> $request->tanggal_pelanggaran,
                'tanggal_konseling'=> $request->tanggal_konseling,
            ]
        );

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil disimpan",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('pelanggaran_siswa.index'));
    }

    public function update(Request $request, int $id)
    {
        // dd($request->all());
        $validation = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg',
            'tindak_lanjut' => 'nullable|in:0,1',
            'id_guru' => 'required|integer|exists:guru,id',
            'id_siswa' => 'required|integer|exists:siswa,id',
            'id_pelanggaran' => 'required|integer|exists:pelanggaran,id',
            'hasil_konseling' => 'string|nullable',
            'tanggal_pelanggaran' => 'required',
            'tanggal_konseling' => 'nullable'
        ]);

        $data = PelanggaranSiswa::findOrFail($id);
        if($request->file('foto') !== null)
        {
            // menyimpan data foto yang diupload ke variabel $file
            $file = $request->file('foto');

            $nama_file = Str::slug(auth()->user()->name)."-".time().'.'.$file->getClientOriginalExtension();

              // isi dengan nama folder tempat kemana file diupload
            $file->move('assets/img/pelanggaran',$nama_file);
            $url_file = 'assets/img/pelanggaran/'.$nama_file;

        } else {
            $url_file = $data->foto;
        }

        $data->update(
            [
                'foto' => $url_file,
                'tindak_lanjut' => $request->tindak_lanjut,
                'id_siswa' => $request->id_siswa,
                'id_guru' => $request->id_guru,
                'id_pelanggaran'=> $request->id_pelanggaran,
                'hasil_konseling'=> $request->hasil_konseling,
                'tanggal_pelanggaran'=> $request->tanggal_pelanggaran,
                'tanggal_konseling'=> $request->tanggal_konseling,
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
        $data = PelanggaranSiswa::findOrFail($id);
        $data->delete();

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('pelanggaran_siswa.index'));
    }

    public function tanggapan(int $id)
    {
        (array) $data = array(
            'title' => 'Tanggapan Pelanggaran Siswa',
            'data' => PelanggaranSiswa::with('tanggapan')->findOrFail($id)
        );
        return view('pages.pelanggaran-siswa.tanggapan', $data);
    }
}
