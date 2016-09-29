<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class NewsCategories extends Model
{
    protected $table = 'newscategories';
    protected $guarded = [''];
    public $timestamps = false;
}
