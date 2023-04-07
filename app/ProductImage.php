<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable = ['id','product_id','images'];

    public function Prodimage()
    {
        return $this->hasMany(Product::class,'product_id');
    }
}
