<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    protected $table="category";
    protected $fillable=[ 
       'id','name'
     ];


    //có tác dụng thay thế cho lệnh join
     public function post()
     {
     	return $this->hasMany('App\postModel','category_id');
     }

}
