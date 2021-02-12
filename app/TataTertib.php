<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TataTertib extends Model
{
    protected $table = 'tata_tertib';

    protected $fillable = ['nama', 'detail'];

    public function pelanggaran()
    {
        return $this->hasMany('App\Pelanggaran', 'id_tata_tertib', 'id');
    }
}
