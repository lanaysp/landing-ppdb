<?php

namespace App\Pengguna; 

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forum extends Model
{
    use SoftDeletes;
    public function komentar()
    {
        return $this->hasMany(ReplyForum::class, 'forum_id');
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class,'user_id')->withTrashed();
    }
}
