<?php

namespace App\Ppdb;

use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    public function tahun()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran')->withTrashed();
    }

    public function pendaftar()
    {
        return $this->hasMany(Ppdb::class,'beasiswa_id');
    }
}
