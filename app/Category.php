<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['id','category_name','image','status','slug'];

    public $timestamps = true;

    public function products()
    {
        return $this->hasMany(Product::class,'cat_id');
    }
}
