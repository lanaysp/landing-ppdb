<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{

    use SoftDeletes;
    
   public function catnews()
   {
       return $this->belongsTo(CatNews::class,'cat_news_id')->withTrashed();
   }

   public function visitor()
   {
       return $this->hasMany(NewsVisit::class);
   }

   public function author() 
   {
       return $this->belongsTo(Employee::class,'news_author')->withTrashed();
   }

   public function comment()
   {
       return $this->hasMany(NewsComment::class,'news_id');
   }
}
