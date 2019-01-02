<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\tagModel;
use Session;
class tagController extends Controller
{
    public function index()
    {
    	$result=DB::select('select * from tag');

    	return view('admin.tag.index',['kq'=>$result]);
    }
    public function create()
    {
    	return view('admin.tag.create');
    }
    public function add(Request $req)
    {
        $this->validate($req,[
           'name'       => 'required'
    	]);

    	DB::table('tag')->insert(['tag'=>$req->name]);
        Session::flash('success','thêm tag thành công');

        return redirect('/admin/tag/index');
    }
    public function delete($id)
    {
    	DB::table('tag')->where('id',$id)->delete();
    	return redirect('/admin/tag/index');
    }
    public function edit($id)
    {
    	$res=DB::table('tag')->where('id',$id)->get();
        return view('admin.tag.edit',['kq'=>$res]);
    }
    public function update(Request $req){

    	 $this->validate($req,[
           'name'       => 'required'
    	]);

    	DB::table('tag')->where('id',$req->id)->update(['tag'=>$req->name]);

    	Session::flash('success','update tag thành công');
    	return redirect('/admin/tag/index');
    }
}
