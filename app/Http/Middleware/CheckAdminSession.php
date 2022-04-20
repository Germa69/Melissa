<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use Closure;

class CheckAdminSession
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
        if(!Session::has('ma_admin')){
            return $next($request);
        }
        else{
            Toastr::warning('Không chuyển hướng nhiều lần!!!','Warning');
            return redirect()->route('dashboard');
        }
    }
}
