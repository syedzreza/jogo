<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['id','cat_id','product_name','product_image','product_title','product_description','sale_price','regular_price','slug','in_stock','status'];

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class,'product_id','id');
    }

    public function productimages()
    {
        return $this->belongsTo(ProductImage::class,'product_id','id');
    }

    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }

}
