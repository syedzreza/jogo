<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = ['id','cookie_id','user_id','product_id','quantity'];

    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
