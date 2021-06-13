<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MadingBoard extends Model
{
    public function posting()
    {
        return $this->belongsTo(User::class,'user_id')->withTrashed();
    }
}
