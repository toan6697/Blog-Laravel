<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\profileModel;
use Session;
use Auth;

class profileController extends Controller
{
     public function edit()
    {
        $id=Auth::user()->id;
 
        $pro=DB::table('profile')->where('user_id',$id)->get();

        return view('admin.user.edit',['kq'=>$pro]);
    }
    public function update(Request $req)
    {
        $this->validate($req,[
           'username'    => 'required',
           'email'   => 'required|email',
           'password'=> 'required',
           'avatar'  => 'required',
           'facebook'=> 'required|url',
           'youtube' => 'required|url',
           'about'   => 'required'  
        ]);

        $id=Auth::user()->id;

        DB::table('users')->where('id',$id)->update(['name'=>$req->username,'email'=>$req->email,'password'=>bcrypt($req->password)]);

        if ($req->hasFile('avatar')) {
        if($req->file('avatar')->isValid()) {
            try {
                $file = $req->file('avatar');
                $nameImage = $file->getClientOriginalName() ;

                $path='http://nguyenductoan.com/laravel/blog-CMS/'.$file->move('upload/',$nameImage);
            } catch (Illuminate\Filesystem\FileNotFoundException $e) {

              }
          }
        } 

        DB::table('profile')->where('user_id',$id)->update(['avatar'=>$path,'about'=>$req->about,'facebook'=>$req->facebook,'youtube'=>$req->youtube]);
        Session::flash('success','update profile thành công');
        return redirect()->route('profile-edit');
    }
}
