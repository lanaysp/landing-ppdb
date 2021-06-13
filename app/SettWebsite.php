<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettWebsite extends Model
{
    protected $fillable   = [
        'theme','teacher_appear','facility_appear','gallery_appear','activity_appear',
        'creativity_appear','prestation_appear','contact_appear','about_appear','news_appear',
        'subject_appear','extra_appear','board_appear','website_logo','footer_text','copy_right',
        'facebook','twitter','instagram','meta_tittle','meta_keyword','meta_description','school_address',
        'school_phone','school_email','dark_logo'
    ];
}
