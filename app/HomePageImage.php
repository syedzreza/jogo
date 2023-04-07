<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePageImage extends Model
{
   protected $table = 'home_page_images';

   protected $fillable = ['image','status'];

   public $timestamps = true;
}
