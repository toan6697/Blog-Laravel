<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class postModel extends Model
{
   
   //sử dụng softDelete để khi xóa 1 category thì sẽ tự động xóa tất cả product của catogory đó
	use SoftDeletes;
	
    protected $table="post";
    protected $fillable=[
       'id','title','content','category_id','featured','slug'
    ];

    protected $dates=['deleted_at'];


   //có tác dụng thay thế cho lệnh join
    public function category()
    {
    	return $this->belongsTo('App\categoryModel','id');
    }
    public function tag()
    {
        //tham số thứ 2 là bảng giao nhau
        return $this->belongsToMany('App\tagModel','post_tag');
    }
}
