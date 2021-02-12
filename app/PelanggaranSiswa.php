<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PelanggaranSiswa extends Model
{
    protected $table = 'pelanggaran_siswa';

    protected $fillable = ['id_siswa','id_guru','id_pelanggaran','hasil_konseling','tanggal_pelanggaran','foto','tindak_lanjut','tanggal_konseling'];

    public function guru()
    {
        return $this->belongsTo('App\Guru', 'id_guru', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'id_siswa', 'id');
    }

    public function pelanggaran()
    {
        return $this->belongsTo('App\Pelanggaran', 'id_pelanggaran', 'id');
    }

    public function tanggapan()
    {
        return $this->hasOne('App\TanggapanWaliMurid', 'id_pelanggaran_siswa', 'id');
    }
}
