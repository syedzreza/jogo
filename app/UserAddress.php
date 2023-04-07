<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
     protected $table = 'user_addresses';

     protected $fillable = ['id','user_id','name','phone','state','city','pincode','address','status'];

     public function user()
     {
         return $this->belongsTo(User::class,'user_id','id');
     }
}
