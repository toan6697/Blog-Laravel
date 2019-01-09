<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\categoryModel;
use App\tagModel;
use App\settingModel;
use App\postModel;
use App\User;
use App\profileModel;
use Session;
class frontendController extends Controller
{
    public function index()
    {
    	$title=settingModel::all();
    	$category=categoryModel::all();
    	$set=settingModel::all();
    	$firstPost=DB::table('post')->orderBy('id','DESC')->get();
    	$post=DB::table('post')->orderBy('id','DESC')->skip(1)->take(2)->get();
    	return view('index',['title'=>$title,'category'=>$category,'firstPost'=>$firstPost[0],'post'=>$post,'set'=>$set]);
    }
    public function postSingle($slug)
    {   
    	$tag=tagModel::all();
    	$title=settingModel::all();
    	$category=categoryModel::all();
    	$user=User::all();
    	$pro=profileModel::all();

    	$post=postModel::where('slug',$slug)->get();
        //dd($_post);
        //lấy ra id trước và sau id hiện tại
        $next_id=postModel::where('id','>',$post[0]->id)->min('id');
        $prev_id=postModel::where('id','<',$post[0]->id)->max('id');
        
        //dd($next_id);
        if(!empty($next_id) && empty($prev_id) ){
        	$post_next=postModel::where('id',$next_id)->get();
        	return view('single',['title'=>$title,'category'=>$category,'tag'=>$tag,'post'=>$post,'post_next'=>$post_next,'user'=>$user,'pro'=>$pro]);
        }
        if(!empty($prev_id) && empty($next_id)){
        	$post_prev=postModel::where('id',$prev_id)->get();
        	return view('single',['title'=>$title,'category'=>$category,'tag'=>$tag,'post'=>$post,'post_prev'=>$post_prev,'user'=>$user,'pro'=>$pro]);
        }
        if(!empty($next_id) && !empty($prev_id) ){
        	$post_next=postModel::where('id',$next_id)->get();
	        $post_prev=postModel::where('id',$prev_id)->get();
	         
	    	return view('single',['title'=>$title,'category'=>$category,'tag'=>$tag,'post'=>$post,'post_next'=>$post_next,'post_prev'=>$post_prev,'user'=>$user,'pro'=>$pro]);
	        }
        
    }
    public function category($id)
    {

    	$title=settingModel::all();
    	$category=categoryModel::all();
    	$tag=tagModel::all();
        $categoryById=categoryModel::where('id',$id)->get();   
        $postById=postModel::where('category_id',$id)->orderBy('id','DESC')->take(3)->get();
        //dd($postById);
    	return view('category',['title'=>$title,'category'=>$category,'tag'=>$tag,'categoryById'=>$categoryById,'postById'=>$postById]);
    }
    public function tag($id)
    {
    	$title=settingModel::all();
    	$category=categoryModel::all();
    	$tag=tagModel::all();
        $tagById=tagModel::where('id',$id)->get();  
    	return view('tag',['title'=>$title,'category'=>$category,'tag'=>$tag,'tagById'=>$tagById]);
    }
    public function search(Request $req)
    {
    	$title=settingModel::all();
    	$category=categoryModel::all();
        $tag=tagModel::all();

    	$result=DB::table('post')->where('title','like','%'.$req->search)->get();
    	return view('search',['title'=>$title,'category'=>$category,'result'=>$result,'key'=>$req->search,'tag'=>$tag]); 
    }
}
