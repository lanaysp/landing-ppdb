<?php

namespace App\Academik;

use App\Teacher;
use Illuminate\Database\Eloquent\Model;

class Extrakulikuler extends Model
{
    public function teacher()
    {
        return $this->belongsTo(Teacher::class)->withTrashed();
    }
}
