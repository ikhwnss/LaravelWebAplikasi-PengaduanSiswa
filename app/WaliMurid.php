<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaliMurid extends Model
{
    protected $table = 'wali_murid';

    protected $fillable = [
        'nama_depan', 'nama_belakang','nomor_telepon','alamat_rumah','email', 'photo'
    ];

    public function siswa()
    {
        return $this->belongsToMany('App\Siswa', 'wali_murid_siswa', 'id_wali_murid', 'id_siswa', 'id','id');
    }

    public function tanggapan()
    {
        return $this->hasMany('App\TanggapanWaliMurid', 'id_wali_murid', 'id');
    }
}
