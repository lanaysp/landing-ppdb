<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function berita()
    {
        return $this->belongsTo(News::class, 'news_id')->withTrashed();
    }
}
