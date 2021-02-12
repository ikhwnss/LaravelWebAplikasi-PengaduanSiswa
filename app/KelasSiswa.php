<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasSiswa extends Model
{
    protected $table = 'kelas_siswa';

    protected $fillable = ['id_tahun_pelajaran', 'id_kelas', 'id_siswa'];

    public function tahunPelajaran()
    {
        return $this->belongsTo('App\TahunPelajaran', 'id_tahun_pelajaran', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'id_kelas', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'id_siswa', 'id');
    }
}
