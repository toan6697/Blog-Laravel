<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\settingModel;
use Session;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
    	$result=settingModel::all();
    	return view('admin.setting.setting',['kq'=>$result]);
    }
    public function update(Request $req)
    {
    	
    	$this->validate($req,[
           'site_name'       => 'required',
           'address'         => 'required',
           'contact_number'  => 'required',
           'contact_email'   => 'required|email'
    	]);
        //dd($req->all());

    	$res=settingModel::find($req->id);
    	$res->site_name     = $req->site_name;
    	$res->address       = $req->address;
    	$res->contact_number= $req->contact_number;
    	$res->contact_email = $req->contact_email;

        $res->save();

        Session::flash('success','update setting thành công');

        return redirect()->back();

    }
}
