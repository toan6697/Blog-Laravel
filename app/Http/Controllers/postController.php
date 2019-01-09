<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryModel;
use App\postModel;
use App\tagModel;
use App\tagPostModel;
use Session;
use Auth;
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
      $result_1=tagModel::all();
 
      if($result->count()==0 && $result_1->count()==0 ){
        Session::flash('info','phải thêm category và tag trước khi thêm post ');
        return redirect()->route('post-index');
      }

    	return view('admin.post.create',['kq'=>$result,'kq1'=>$result_1]);
    }
    public function add(Request $req)
    {
      //dd($req->all());
    	$this->validate($req,[
           'title'       => 'required',
           'featured'    => 'required|image',
           'category_id' => 'required',
           'content'     => 'required',
           'tag_id'      => 'required'
    	]);

      //dd($req->all());
            
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
    	$post=postModel::create([ 
          'title'        => $req->title,
          'content'      => htmlspecialchars($req->content),
          'category_id'  => $req->category_id,
          'featured'     => $path,
          'slug'         => str_slug($req->title,'-'),
          'user_id'      => Auth::user()->id

    	]);
      
      //khi thêm bản ghi vào 1 bảng sẽ tự động thêm bảng còn lại
      $post->tag()->attach($req->tag_id);
      
         Session::flash('success','Thêm thành công hahah !');
    	   //session()->put(['success'=>'Thêm thành công hhii ']) ;
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
    	$res=postModel::find($id)->toArray();
    	$res_1=categoryModel::all()->toArray();
 
      $res_2=tagModel::all()->toArray();
      $res_3=postModel::find($id)->tag()->get()->toArray();
    	return view('admin.post.edit',['kq'=>$res,'kq2'=>$res_1,'kq3'=>$res_2,'kq4'=>$res_3]);
    }
    public function update(Request $req)
    {

    	$this->validate($req,[
             'title'       => 'required',
             'category_id' => 'required',
             'content'     => 'required',
             'tag_id'      => 'required'
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

        $post=postModel::find($req->id);
        $post->title=$req->title;
        $post->content=$req->content;
        if(!empty($path)){
        	$post->featured=$path;
        }
        else {  }
        $post->category_id=$req->category_id;

        $post->save();

        $post->tag()->sync($req->tag_id);
        
        Session::flash('success','update thành công hahah !');
        return redirect('/admin/post/index');
    }
}
