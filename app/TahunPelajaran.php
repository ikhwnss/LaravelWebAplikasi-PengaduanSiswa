<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunPelajaran extends Model
{
    protected $table = 'tahun_pelajaran';

    protected $fillable = ['nama', 'aktif'];

    public function jurusan()
    {
        return $this->belongsToMany('App\Jurusan', 'tahun_pelajaran_jurusan', 'id_tahun_pelajaran', 'id_jurusan');
    }
}
