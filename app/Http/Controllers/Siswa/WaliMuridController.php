<?php

namespace App\Http\Controllers\Siswa;

use App\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WaliMuridController extends Controller
{
    public function index()
    {
        $siswa = Siswa::find(auth()->user()->data_id);
       (array) $data = [
            'title' => 'Wali Murid',
            'data' => $siswa == null ? collect() : $siswa->waliMurid
        ];
        return view('pages-siswa.wali-murid.index', $data);
    }
}
