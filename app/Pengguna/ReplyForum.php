<?php

namespace App\Pengguna;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ReplyForum extends Model
{
    public function forum_induk()
    {
        return $this->belongsTo(Forum::class, 'forum_id')->withTrashed();
    }

    public function pengguna()
    {
        return $this->belongsTo(User::class,'user_id')->withTrashed();
    }
}
