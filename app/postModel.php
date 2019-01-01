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

    public function category()
    {
    	return $this->belongsTo('App\categoryModel');
    }
}
