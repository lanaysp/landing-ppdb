<?php

namespace App\Pengguna;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserActivity extends Model
{
    use SoftDeletes;

    public function pengguna()
    {
        return $this->belongsTo(User::class,'user_id')->withTrashed();
    }
}
