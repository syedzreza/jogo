<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = "home_pages";

    public $timestamps = true;

    protected $fillable = ['title','description','button_name','link','delivery','status'];
}
