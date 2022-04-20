<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;
use Closure;

class CheckSuperAdminLogin
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
        if(Session::get('cap_do') == 1){
            return $next($request);
        }
        else{
            Toastr::warning('Không thể thực hiện thao tác vì bạn không phải SuperAdmin', 'Warning');
            return redirect()->route('dashboard');
        }
    }
}
