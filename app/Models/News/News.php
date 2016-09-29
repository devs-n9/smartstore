<?php

namespace App\Models\News;
use Illuminate\Database\Eloquent\Model;
use App\Models\News\NewsCategories;
use App\Models\News\NewsImages;

class News extends Model
{
    protected $table = 'news';
    public $timestamps = false;
    protected $guarded = [''];
      // relations begin

    public function Category()
    {
        return $this->belongsTo('App\Models\NewsCategories', 'category_id', 'id');
    }
 
    public function images()
    {
        return $this->hasMany('App\Models\News\NewsImages', 'id', 'news_id');
    }
    // relations end


    public function getNews($id)
    {
        return $this->where('id', $id)->get();
    }
}





