<?php

namespace App\Ppdb;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    public function pengguna()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
