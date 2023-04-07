<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
       protected $table = 'orders';

       protected $fillable = ['id','user_id','shipping_id','order_no','order_total','pay_trans_no','order_status','payment_method','payment_status'];

       public $timestamps = true;

       public function orderdetail()
       {
           return $this->hasMany(OrderDetail::class,'order_id');
       }
}
