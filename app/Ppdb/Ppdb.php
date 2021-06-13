<?php

namespace App\Ppdb;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ppdb extends Model
{
    use SoftDeletes;
    public function gelombang_daftar()
    {
        return $this->belongsTo(Gelombang::class, 'gelombang_id')->withTrashed();
    }

    public function pendaftar()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

}
