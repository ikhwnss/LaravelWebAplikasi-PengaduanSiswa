<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    protected $table = 'pelanggaran';

    protected $fillable = [
        'id_tata_tertib', 'nama', 'detail','poin','kategori','sanksi'
    ];

    public function tataTertib()
    {
        return $this->belongsTo('App\TataTertib', 'id_tata_tertib', 'id');
    }
}
