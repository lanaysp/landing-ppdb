<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatNews extends Model
{
    use SoftDeletes;
    public function news() {
        return $this->hasMany(News::class);
    }
}
