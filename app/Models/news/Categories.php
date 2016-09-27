<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $guarded = [''];
    public $timestamps = false;

    public function News()
    {
        return $this->belongsToMany('App\Models\News', 'newscategories', 'category_id', 'news_id');
    }
}


