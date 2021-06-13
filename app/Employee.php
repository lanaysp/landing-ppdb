<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{

    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class)->withTrashed();
    }

    public function sosmed()
    {
        return $this->hasMany(EmployeeSosmed::class);
    }

    public function skill()
    {
        return $this->hasMany(EmployeeSkill::class);
    }

    public function about()
    { 
        return $this->hasOne(EmployeeAbout::class);
    }

    public function education()
    {
        return $this->hasMany(EmployeeEducation::class);
    }

    public function experience()
    {
        return $this->hasMany(EmployeeExperience::class);
    }

    public function gallery()
    {
        return $this->hasMany(EmployeeGallery::class);
    }

}
