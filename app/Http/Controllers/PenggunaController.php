<?php

namespace App\Http\Controllers;


use App\Guru;
use App\User;
use App\Siswa;
use App\WaliMurid;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class PenggunaController extends Controller
{
    public function index()
    {
        (array) $data = [
            'title' => 'Pengguna',
            'data' => User::all()
        ];
        return view('pages.pengguna.index', $data);
    }

    public function generate()
    {
        (array) $data = [
            'title' => 'Buat Pengguna Berdasarkan Data',
            'collection' => collect(['siswa' => 'Siswa', 'guru' => 'Guru', 'wali_murid' => 'Wali Murid', ])
        ];
        return view('pages.pengguna.generate', $data);
    }

    public function generateAction(Request $request)
    {
        $request->validate([
            'role' => 'required|string|in:siswa,guru,wali_murid'
        ]);
        $role = $request->role;
        $data = null;
        $user = null;
        switch ($role) {
            case 'siswa':
                $data_id = User::where('role','siswa')->pluck('data_id');
                $siswa = Siswa::whereNotIn('id', $data_id)->get();
                foreach ($siswa as $item) {
                    $data[] = [
                        'name' => "$item->nama_depan $item->nama_belakang",
                        'data_id' => $item->id,
                        'photo' => $item->photo,
                        'role' => 'siswa',
                        'username' => $item->nis,
                        'email_verified_at' => now(),
                        'password' => Hash::make('RUHPEKA'), // password
                        'remember_token' => Str::random(10),
                    ];
                }
                break;
            case 'guru':
                $data_id = User::where('role','guru')->pluck('data_id');
                $guru = Guru::whereNotIn('id', $data_id)->get();

                foreach ($guru as $item) {
                    $data[] = [
                        'name' => "$item->nama_depan $item->nama_belakang",
                        'data_id' => $item->id,
                        'photo' => $item->photo,
                        'role' => 'guru',
                        'username' => $item->kode_guru,
                        'email_verified_at' => now(),
                        'password' => Hash::make('RUHPEKA'), // password
                        'remember_token' => Str::random(10),
                    ];
                }
                break;
            case 'wali_murid':
                $data_id = User::where('role','wali_murid')->pluck('data_id');
                $wali_murid = WaliMurid::whereNotIn('id', $data_id)->get();
                foreach ($wali_murid as $item) {
                    $data[] = [
                        'name' => "$item->nama_depan $item->nama_belakang",
                        'data_id' => $item->id,
                        'photo' => $item->photo,
                        'role' => 'wali_murid',
                        'username' => Str::random(10),
                        'email_verified_at' => now(),
                        'password' => Hash::make('RUHPEKA'), // password
                        'remember_token' => Str::random(10),
                    ];
                }

                break;

            default:
                $data = null;
                break;
        }

        if($data !== null)
        {
            $user = User::insert($data);
        }

        if ($user) {
            toast("Pengguna dengan $role berhasil ditambahkan",'success');
        } else {
            toast("Tidak Ada Data ditambahkan",'error');
        }

        return redirect()->back();
    }

    public function reset(int $id)
    {
        $data = User::findOrFail($id);
        $data->update(['password' => Hash::make('RUHPEKA')]);

        if ($data instanceof Model) {
            toast("Data $data->name berhasil diatur ulang kata sandi",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('pengguna.index'));
    }

    public function delete(int $id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        if ($data instanceof Model) {
            toast("Data $data->name berhasil dihapus",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('pengguna.index'));
    }
}
