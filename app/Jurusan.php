<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = ['nama', 'detail'];

    public function kelas()
    {
        return $this->hasMany('App\Kelas', 'id_jurusan', 'id');
    }
}
