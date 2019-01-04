<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->admin){
            Session::flash('info','bạn cần có quyền admin để hoàn thành thao tác');

            return redirect()->back();
        }
        return $next($request);
    }
}
