<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';
    public $timestamps = false;
    protected $guarded = [''];

    // relations begin
    public function category()
    {
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }
    // relations end
}
