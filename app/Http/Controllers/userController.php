<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\profileModel;
use Session;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
    	$user=User::all();
    	//dd($user);
    	return view('admin.user.index',['kq'=>$user]);
    }
    public function create()
    {
    	return view('admin.user.create');
    }
    public function add(Request $req)
    {
    	$this->validate($req,[
           'name'    => 'required',
           'email'   => 'required|email',
           'password'=> 'required'
        ]);

        $password=bcrypt($req->password);
        //$req->offsetUnset('_token','password');
        //$req->merge(['password'=>$password]);
        $user = User::create([
            'name'    => $req->name,
            'email'   => $req->email,
            'password'=> $password  
        ]);
       profileModel::create([
          'user_id'=>$user->id
       ]);
        
       Session::flash('success','Thêm user thành công');
       
       return redirect('/admin/user/index'); 
    }
    public function updatePermission()
    {
        $id=$_GET['id'];
        $user=DB::table('users')->where('id',$id)->get();
        if($user[0]->admin==0){
            DB::table('users')->where('id',$id)->update(['admin'=>1]);
            $array=[
              'status' => true
            ];
            echo json_encode($array);
        }
        else{
            DB::table('users')->where('id',$id)->update(['admin'=>0]);

            $array=[
              'status' => true
            ];
            echo json_encode($array);
        }
    }
}
