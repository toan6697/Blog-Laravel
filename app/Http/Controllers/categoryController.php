<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\categoryModel;
use App\postModel;
use Session;
class categoryController extends Controller
{
    public function index()
    {
    	$data=categoryModel::all();
    	return view('admin.category.index',['kq'=>$data]);
    }
    public function create()
    {
    	return view('admin.category.create');
    }
    public function add(Request $req)
    {

    	$req->validate([
          'name'=>'required'
    	]);
    	$name=$req->name;
    	$data=new categoryModel;
    	$data->name=$name;
    	$data->save();
        
        Session::flash('success','Thêm thành công !');
    	return redirect('/admin/category/index');

    }
    public function delete(Request $req)
    {
    	categoryModel::destroy($req->id);
        DB::table('post')->where('category_id',$req->id)->delete();
        //Session::flash('success','Xóa thành công !');

    	$result=categoryModel::all()->toArray();
        $data=array(
           'status' => true,
           'kq'     => $result
        ); 
    	echo json_encode($data);
    }
    public function edit(Request $req)
    {
    	$result=categoryModel::find($req->id)->toArray();
        $data=array(
           'status' => true,
           'kq'     => $result
        );
        echo json_encode($data);
    }
    public function update(Request $req)
    {
    	$category=categoryModel::find($req->id);
    	$category->name=$req->name;
    	$category->save();

        //Session::flash('success','Update thành công !');
  
    	$result=categoryModel::all()->toArray();
        $data=array(
           'status' => true,
           'kq'     => $result
        ); 
    	echo json_encode($data);
    }
}

