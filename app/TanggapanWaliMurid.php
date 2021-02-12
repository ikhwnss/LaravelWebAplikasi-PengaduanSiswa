<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TanggapanWaliMurid extends Model
{
    protected $table = 'tanggapan_wali_murid';

    protected $fillable = ['id_pelanggaran_siswa','id_wali_murid','tanggapan','created_at','updated_at'];

    public function pelanggaranSiswa()
    {
        return $this->belongsTo('App\PelanggaranSiswa', 'id_pelanggaran_siswa', 'id');
    }

    public function waliMurid()
    {
        return $this->belongsTo('App\WaliMurid', 'id_wali_murid', 'id');
    }
}
