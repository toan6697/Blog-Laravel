<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    protected $table="category";
    protected $fillable=[ 
       'id','name'
     ];

     public function post()
     {
     	return $this->hasMany('App\postModel');
     }

}
