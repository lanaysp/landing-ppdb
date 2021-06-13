<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;
    public function employee()
    {
        return $this->belongsTo(Employee::class)->withTrashed();
    }
}
