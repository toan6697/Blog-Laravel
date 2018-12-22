<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    public function index()
    {
    	
    }
    public function create()
    {
    	return view('admin.post.create');
    }
    public function add(Request $req)
    {
    	dd($req->all());
    }
}
