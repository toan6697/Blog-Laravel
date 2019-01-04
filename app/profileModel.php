<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profileModel extends Model
{
    protected $table="profile";
    protected $fillable=[
       'id','user_id','avatar','about','facebook','youtube'
    ];
    public function users()
    {
    	return $this->belongsTo('App\User','id');
    }
}
