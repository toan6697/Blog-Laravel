<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryModel;
use App\postModel;
use Session;
class postController extends Controller
{
    public function index()
    {
    	$result=postModel::all()->toArray();
    	$result_cate=categoryModel::all()->toArray();

        $new_array=array();

        foreach ($result_cate as $key => $value) {
        	$new_array[$value['id']]=$value;
        }
    	return view('admin.post.index',['kq1'=>$result,'kq2'=>$new_array]);
    }
    public function create()
    {
    	$result=categoryModel::all();
    	return view('admin.post.create',['kq'=>$result]);
    }
    public function add(Request $req)
    {
    	$this->validate($req,[
           'title'       => 'required',
           'featured'    => 'required|image',
           'category_id' => 'required',
           'content'     => 'required'
    	]);
            
        if ($req->hasFile('featured')) {
        if($req->file('featured')->isValid()) {
            try {
                $file = $req->file('featured');
                $nameImage = $file->getClientOriginalName() ;

                $path='http://nguyenductoan.com/laravel/blog-CMS/'.$file->move('upload/',$nameImage);
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

              }
          }
        } 
    	postModel::create([ 
          'title'        => $req->title,
          'content'      => $req->content,
          'category_id'  => $req->category_id,
          'featured'     => $path,
          'slug'         => str_slug($req->title,'-')
    	]);
        
         //Session::flash('success','Thêm thành công hahah !');
    	 session()->put(['success'=>'Thêm thành công hhii ']) ;
         return redirect('/admin/post/index');
    }
    public function delete($id)
    {
    	postModel::destroy($id);
        
        session()->put(['success'=>'xóa thnahf công hhihihi']);
    	return redirect('/admin/post/index');
    }
    public function edit($id)
    {
    	$res=postModel::find($id);
    	dd($res->featured);
    }
}
