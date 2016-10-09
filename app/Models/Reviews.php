<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';
    public $timestamps = true;
    protected $guarded = [''];

    // relations begin
    public function category()
    {
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    // relations end
}
