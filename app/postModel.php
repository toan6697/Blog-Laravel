<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postModel extends Model
{
    protected $table="post";
    protected $fillable=[
       'id','title','content','category_id','featured'
    ];
    public function category()
    {
    	return $this->belongsTo('App\categoryModel');
    }
}
