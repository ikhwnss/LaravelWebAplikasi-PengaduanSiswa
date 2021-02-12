<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        (array) $data = [
            'title' => 'Profil',
            'data' => auth()->user()
        ];
        return view('pages.profil.index', $data);
    }

    public function edit()
    {

        (array) $data = [
            'title' => 'Edit Profil',
            'data' => auth()->user()
        ];
        return view('pages.profil.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|file|image|mimes:jpeg,png,jpg',
            'username' => 'required|unique:users,username,'.auth()->user()->id,
            'password' => 'required|string|min:7|confirmed'
        ]);


        $profil = auth()->user();

        if($request->file('photo') !== null)
        {
            // menyimpan data photo yang diupload ke variabel $file
            $file = $request->file('photo');

            $nama_file = Str::slug(auth()->user()->name)."-".time().'.'.$file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $file->move('assets/img/profil',$nama_file);
            $url_file = 'assets/img/profil/'.$nama_file;
        } else {
            $url_file = $profil->photo;
        }

        $profil->update([
            'photo' => $url_file,
            'username' => $request->username,
            'password' => Hash::make($request->password),

        ]);

        if ($profil) {
            toast("Pengguna $profil->name berhasil diperbaharui",'success');
        } else {
            toast("Terjadi Kesalahan",'error');
        }

        return redirect(route('dashboard'));
    }
}
