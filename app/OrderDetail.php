<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = ['id','order_id','product_id','product_quantity','product_price'];

    public $timestamps = true;

    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function productsdetails()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
