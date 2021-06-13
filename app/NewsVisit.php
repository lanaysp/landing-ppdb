<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsVisit extends Model
{
    public function news() 
    {
        return $this->belongsTo(News::class)->withTrashed();
    }
}
