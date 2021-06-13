<?php

namespace App\Ppdb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gelombang extends Model
{

    use SoftDeletes;
    public function tahun()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id')->withTrashed();
    }

    public function pendaftar()
    {
        return $this->hasMany(Ppdb::class, 'gelombang_id');
    }
}
