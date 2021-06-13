<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebAbout extends Model
{
    protected $fillable   = [
        'vission','image_vission','mission','image_mission','slogan','image_slogan','about','image_about','link_video'
    ];
}
