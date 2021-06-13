<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    public function teacher()
    {
        return $this->belongsTo(Teacher::class)->withTrashed();
    }
}
