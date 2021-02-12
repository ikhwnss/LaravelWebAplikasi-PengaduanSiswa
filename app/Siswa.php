<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nama_depan', 'nama_belakang','nis','nomor_telepon','alamat_rumah','email', 'photo'
    ];

    public function getNamaAttribute()
    {
        return "{$this->nama_depan} {$this->nama_belakang}";
    }

    public function waliMurid()
    {
        return $this->belongsToMany('App\WaliMurid', 'wali_murid_siswa', 'id_siswa', 'id_wali_murid', 'id','id');
    }

    public function kelas()
    {
        return $this->hasMany('App\KelasSiswa','id_siswa','id');
    }

    public function tanggunganPembayaran()
    {
        return $this->hasMany('App\TanggunganPembayaran', 'id_siswa', 'id');
    }
}
