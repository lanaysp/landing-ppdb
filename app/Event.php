<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    public function category() {
        return $this->belongsTo(EventCat::class,'event_cat_id')->withTrashed();
    }
}
