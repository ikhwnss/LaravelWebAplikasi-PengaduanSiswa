<?php

namespace App\Http\Controllers\WaliMurid;

use App\WaliMurid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index()
    {
        $wali = WaliMurid::findOrFail(auth()->user()->data_id);
        (array) $data = [
            'title' => 'Siswa',
            'data' => $wali->siswa
        ];
        return view('pages-wali-murid.siswa.index', $data);
    }
}
