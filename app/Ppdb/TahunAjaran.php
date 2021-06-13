<?php

namespace App\Ppdb;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahunAjaran extends Model
{

    use SoftDeletes;
    public function sesidaftar()
    {
        return $this->hasMany(Gelombang::class, 'tahun_ajaran_id');
    }
}
