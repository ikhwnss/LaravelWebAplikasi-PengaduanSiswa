<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = ['id_jurusan', 'nama', 'detail'];

    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan', 'id_jurusan', 'id');
    }

    public function siswa()
    {
        return $this->hasMany('App\KelasSiswa', 'id_kelas', 'id');
    }

    // public function siswa()
    // {
    //     return $this->belongsToMany('App\Siswa', 'kelas_siswa', 'id_kelas', 'id_siswa');
    // }
}
