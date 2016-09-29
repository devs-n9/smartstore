<?php

namespace App\Models\News;
use Illuminate\Database\Eloquent\Model;
use App\Models\News\Categories;
use App\Models\News\Newscategories;
use App\Models\News\NewsImages;

class News extends Model
{
    protected $table = 'news';
    public $timestamps = false;
    protected $guarded = [''];
      // relations begin

    public function Categories()
    {
        return $this->belongsToMany('App\Models\News\Categories', 'Newscategories', 'news_id', 'category_id');
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





