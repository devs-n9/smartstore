<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    protected $guarded = [''];
    
    public function getCategory($id) {
        return $this->where('id', $id)->get;
    }
}
