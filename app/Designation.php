<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    use SoftDeletes;
    public function department()
    {
        return $this->belongsTo(Department::class)->withTrashed();
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
