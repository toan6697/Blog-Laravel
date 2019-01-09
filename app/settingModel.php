<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class settingModel extends Model
{
    protected $table="settings";
    protected $fillable=[
        'site_name','address','contact_email','contact_number' 
    ];
}
