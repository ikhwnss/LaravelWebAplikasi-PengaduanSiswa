<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Siswa;
use App\Jurusan;
use App\KelasSiswa;
use App\TahunPelajaran;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class KelasController extends Controller
{
    public function index()
    {
        (array) $data = array(
            'title' => 'Kelas',
            'data' => Kelas::with('jurusan')->get()
        );
        return view('pages.kelas.index', $data);
    }

    public function tambah()
    {
        (array) $data = array(
            'title' => 'Tambah Kelas',
            'collection' => Jurusan::pluck('nama', 'id')
        );
        return view('pages.kelas.tambah', $data);
    }

    /**
     * Fungsi detail
     *
     * @param integer $id
     * @return void
     */
    public function detail(int $id)
    {
        /**
         * Menampilkan data kelas dengan parameter id
         * paramater id digunakan untuk mencari data dari database
         * jika tidak ditemukan maka akan dikembalikan nilai false
        */
        $kelas = Kelas::findOrFail($id);
        /** mendapatkan data tahun pelajaran yang sedang aktif */
        $tahun_pelajaran = TahunPelajaran::where('aktif', 1)->first();
        /**
         * mendapatkan siswa pada kelas yang dipilih
         * pada tahun pelajaran yang aktif
         *
         */
        $siswa = KelasSiswa::with('siswa','kelas')
                    ->where('id_tahun_pelajaran', $tahun_pelajaran->id)
                    ->where('id_kelas', $id)
                    ->get();
        (array) $data = array(
            'title' => 'Detail Kelas',
            'tahun_pelajaran' => $tahun_pelajaran,
            'kelas' => $kelas,
            /** mendapatkan siswa yang belum masuk kelas pada tahun ajaran aktif */
            'data' => Siswa::whereIn('id', $siswa->pluck('id_siswa'))->get(),
        );
        return view('pages.kelas.detail', $data);
    }


    public function edit(int $id)
    {
        (array) $data = array(
            'title' => 'Edit Kelas',
            'data' => Kelas::findOrFail($id),
            'collection' => Jurusan::pluck('nama', 'id')

        );
        return view('pages.kelas.edit', $data);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'id_jurusan' => 'required|exists:jurusan,id',
            'nama' => 'required|string|max:255',
            'detail' => 'string|nullable'
        ]);

        $data = Kelas::create(
            [
                'id_jurusan' => $request->id_jurusan,
                'nama' => $request->nama,
                'detail' => $request->detail,
            ]
        );

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil disimpan",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('kelas.index'));
    }

    public function update(Request $request, int $id)
    {
        $validation = $request->validate([
            'id_jurusan' => 'required|exists:jurusan,id',
            'nama' => 'required|string|max:255',
            'detail' => 'string|nullable'
        ]);

        $data = Kelas::findOrFail($id);
        $data->update(
            [
                'id_jurusan' => $request->id_jurusan,
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
        $data = Kelas::findOrFail($id);
        $data->delete();

        if ($data instanceof Model) {
            toast("Data $data->nama berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('kelas.index'));
    }

    public function siswa(int $id)
    {
        $kelasDipilih = Kelas::findOrFail($id);
        $tahun_pelajaran = TahunPelajaran::where('aktif', 1)->first();
        $siswa = KelasSiswa::with('siswa','kelas')->where('id_tahun_pelajaran', $tahun_pelajaran->id)->get();
        (array) $data = [
            'tahun_pelajaran' => $tahun_pelajaran,
            'kelas' => $kelasDipilih,
            'title' => "Siswa Kelas $kelasDipilih->nama Pada Tahun Pelajaran $tahun_pelajaran->nama",
            'data' => $kelas = $siswa->where('id_kelas', $kelasDipilih->id),
            'siswa' => Siswa::whereNotIn('id', $siswa->pluck('id_siswa'))->get(),
        ];

        return view('pages.kelas.siswa', $data);
    }

    public function siswaTambah(Request $request, int $id)
    {
        $tahun_pelajaran = TahunPelajaran::where('aktif', 1)->first()->id;

        $siswa = $request->siswa;
        for ($i=0; $i < count($siswa); $i++) {
            $id_siswa = $siswa[$i];
            $data[] = [
                    'id_tahun_pelajaran' => $tahun_pelajaran,
                    'id_kelas' => $id,
                    'id_siswa' => (int) $id_siswa
                ];

        }
        $data = KelasSiswa::insert($data);

        if ($data) {
            toast("Data berhasil dimasukkan",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect()->back();
    }

    public function siswaHapus(int $id, int $id_siswa)
    {
        $tahun_pelajaran = TahunPelajaran::where('aktif', 1)->first()->id;

        $data = KelasSiswa::where(['id_kelas' => $id])
                ->where(['id_siswa' => $id_siswa])
                ->where(['id_tahun_pelajaran' => $tahun_pelajaran])
                ->delete();

        if ($data) {
            toast("Data berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect()->back();

    }
}
