<?php

namespace App\Document;

use App\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TandaTangan extends Model
{
    use SoftDeletes;

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id')->withTrashed();
    }
}
