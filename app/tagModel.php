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

    //có tác dụng thay thế cho lệnh join
    public function post()
    {    
        //tham số thứ 2 là bảng giao nhau
    	return $this->belongsToMany('App\postModel','post_tag');
    }
}
