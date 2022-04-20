<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function view_all(){
        $users = Admin::all();

        return view('admin.user.view_all',[
            'users' => $users
        ]);
    }

    public function view_insert(){
        return view('admin.user.view_insert');
    }

    public function process_insert(Request $rq)
    {
        if ($rq->isMethod("POST")) {
            try {
                DB::beginTransaction();
                $data = array();

                $data['ten'] = $rq->ten;
                $data['dia_chi'] = $rq->dia_chi;
                $data['sdt'] = $rq->sdt;
                $data['email'] = $rq->email;
                $data['mat_khau'] = Hash::make($rq->mat_khau);
                $data['cap_do'] = $rq->cap_do;

                $get_image = $rq->file('file');
                $path         = 'public/uploads/avatar/';

                if($get_image) {
                    // Lấy tên ảnh
                    $get_name_image = $get_image->getClientOriginalName();
                    // Sử dụng hàm tách chuỗi
                    $name_image = current(explode('.', $get_name_image));
                    // Lấy đuôi mở rộng của hình ảnh
                    $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                    $get_image->move($path, $new_image);
                    $data['avatar']   = $new_image;
                }

                Admin::create($data);

                DB::commit();
                Toastr::success('Thêm người dùng thành công', 'Success');
                return redirect()->route('user.view_all');
            } catch (\Throwable $th) {
                DB::rollBack();
                unlink($path.$new_image);
                Toastr::error('Thêm người dùng thất bại', 'Error');
                return redirect()->route('user.view_all');
            }
        } else {
            Toastr::warning('Phương thức truyền vào không đúng', 'Warning');
            return redirect()->route('user.view_insert');
        }
    }

    public function view_update($ma)
    {
        $user =  Admin::find($ma);
        return view('admin.user.view_update', ['user' => $user]);
    }


    public function process_update(Request $rq, $ma){
        try {
            DB::beginTransaction();
            Admin::find($ma)->update($rq->all());
            DB::commit();
            Toastr::success('Cập nhật quyền thành công', 'Success');
            return redirect()->route('user.view_all');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Cập nhật quyền thất bại', 'Error');
            return redirect()->route('user.view_all');
        }
    }

    public function reissue_password(Request $rq)
    {
        try {
            DB::beginTransaction();
            $data = $rq->all();
            $user = Admin::findOrFail($data['ma']);
            $password = Hash::make('123456');
            if (Hash::check($user->mat_khau, $password)) {
                Toastr::warning('Mật khẩu đã được cấp lại, không nên thao tác nhiều lần!', 'Warning');
                return redirect()->route('user.view_all');
            } else {
                $user->mat_khau = Hash::make($password);
                $user->save();
                DB::commit();
                Toastr::success('Cấp lại mật khẩu thành công', 'Success');
                return redirect()->route('user.view_all');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Cấp lại mật khẩu thất bại', 'Error');
            return redirect()->route('user.view_all');
        }
    }

    public function delete(Request $rq)
    {
        try {
            DB::beginTransaction();
            $data = $rq->all();
            $path = 'public/uploads/avatar/';
            $user = Admin::findOrFail($data['ma']);
            $user->delete();
            unlink($path.$user->avatar);
            DB::commit();
            Toastr::success('Đã xóa người dùng thành công', 'Success');
            return redirect()->route('user.view_all');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Xóa người dùng thất bại', 'Error');
            return redirect()->route('user.view_all');
        }
    }

    public function profile($ma)
    {
        $user = Admin::find($ma);
        return view('admin.user.profile', [
            'user'=> $user
        ]);
    }

    public function profile_update(Request $rq, $ma)
    {
        try {
            DB::beginTransaction();

            $data = array();

            $data['ten'] = $rq->ten;
            $data['dia_chi'] = $rq->dia_chi;
            $data['sdt'] = $rq->sdt;
            $data['email'] = $rq->email;
            $data['mat_khau'] = Hash::make($rq->mat_khau);;

            $get_image = $rq->file('file');
            $path         = 'public/uploads/avatar/';

            if ($get_image) {
                // Lấy tên ảnh
                $get_name_image = $get_image->getClientOriginalName();
                // Sử dụng hàm tách chuỗi
                $name_image = current(explode('.', $get_name_image));
                // Lấy đuôi mở rộng của hình ảnh
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path, $new_image);
                $data['avatar']   = $new_image;

                $user = Admin::find($ma);
                unlink($path.$user->avatar);

                if (Hash::check($rq->mat_khau, $user->mat_khau)) {
                    Toastr::warning('Mật khẩu này đang được sử dụng', 'Warning');
                    return redirect()->route('user.profile', [$ma]);
                } else {
                    $user->update($data);
                    DB::commit();
                    Toastr::success('Cập nhật thông tin thành công','Success');
                    return redirect()->route('user.profile', [$ma]);
                }
            }

            $user = Admin::find($ma);

            if (Hash::check($rq->mat_khau, $user->mat_khau)) {
                Toastr::warning('Mật khẩu này đang được sử dụng', 'Warning');
                return redirect()->route('user.profile', [$ma]);
            } else {
                Admin::find($ma)->update($data);
                DB::commit();
                Toastr::success('Cập nhật thông tin thành công','Success');
                return redirect()->route('user.profile', [$ma]);
            }

        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Cập nhật thông tin thất bại', 'Error');
            return redirect()->route('user.profile', [$ma]);
        }
    }
}
