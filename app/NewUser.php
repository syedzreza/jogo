<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewUser extends Model
{
     protected $table = 'new_users';

     protected $fillable = ['name','course'];
}
