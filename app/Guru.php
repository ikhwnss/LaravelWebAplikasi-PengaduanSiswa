<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'nama_depan', 'nama_belakang','kode_guru','nomor_telepon','alamat_rumah','email', 'photo'
    ];
}
