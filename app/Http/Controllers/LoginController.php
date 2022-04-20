<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Admin;

class LoginController
{
    public function view_login()
    {
        return view('view_login');
    }

    public function process_login(Request $rq)
    {
        $admin = Admin::where('email', $rq->email)->first();
        if (!empty($admin) && Hash::check($rq->password, $admin->mat_khau)) {
            Session::put('ma_admin', $admin->ma);
            Session::put('ten_admin', $admin->ten);
            Session::put('email', $admin->email);
            Session::put('avatar', $admin->avatar);
            Session::put('cap_do', $admin->cap_do);

            Toastr::success('Đăng nhập vào trang quản trị thành công','Success');
            return redirect()->route('dashboard');
        } else {
            Toastr::error('Email hoặc mật khẩu của bạn đã sai hoặc không tồn tại','Error');
            return redirect()->route('admin.view_login');
        };
    }

    public function logout()
    {
        Session::flush();
        Toastr::success('Đã đăng xuất rồi đếy','Success');
        return redirect()->route('admin.view_login');
    }
}
