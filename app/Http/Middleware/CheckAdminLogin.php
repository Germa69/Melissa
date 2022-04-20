<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use Closure;

class CheckAdminLogin
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
        if(Session::has('ma_admin')){
            return $next($request);
        }
        else{
            Toastr::warning('Đăng nhập đê, chưa có tài khoản thì đăng kí đê','Warning');
            return redirect()->route('admin.view_login');
        }
    }
}
