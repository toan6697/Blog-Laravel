<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tagModel extends Model
{
    protected $table='tag';
    public $timestamps = true;
    protected $fillable=[
       'id','tag'
    ];
    public function post()
    {
    	return $this->belongsToMany('App\postModel');
    }
}
