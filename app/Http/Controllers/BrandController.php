<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Brand;

class BrandController extends Controller
{
    public function view_all(Request $rq){
        $brands = Brand::all();

        return view('admin.brand.view_all',[
            'brands' => $brands
        ]);
    }

    public function view_insert()
    {
        return view('admin.brand.view_insert');
    }

    public function process_insert(Request $rq)
    {
        if ($rq->isMethod("POST")) {
            try {
                DB::beginTransaction();
                $data = array();

                $data['ten_hang_xe'] = $rq->ten_hang_xe;

                $get_image = $rq->file('file');
                $path         = 'public/uploads/brand/';

                if($get_image) {
                    // Lấy tên ảnh
                    $get_name_image = $get_image->getClientOriginalName();
                    // Sử dụng hàm tách chuỗi
                    $name_image = current(explode('.', $get_name_image));
                    // Lấy đuôi mở rộng của hình ảnh
                    $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                    $get_image->move($path, $new_image);
                    $data['logo']   = $new_image;
                }
        
                Brand::create($data);

                DB::commit();
                Toastr::success('Thêm hãng xe thành công', 'Success');
                return redirect()->route('brand.view_all');
            } catch (\Throwable $th) {
                DB::rollBack();
                unlink($path.$new_image);
                Toastr::error('Thêm hãng xe thất bại', 'Error');
                return redirect()->route('brand.view_all');
            }
        } else {
            Toastr::warning('Phương thức truyền vào không đúng', 'Warning');
            return redirect()->route('brand.view_insert');
        }
    }

    public function view_update($ma)
    {
        $brand = Brand::find($ma);

        return view('admin.brand.view_update', ['brand' => $brand]);
    }

    public function process_update(Request $rq, $ma){
        try {
            DB::beginTransaction();
            $data = array();

            $data['ten_hang_xe'] = $rq->ten_hang_xe;

            $get_image = $rq->file('file');
            $path         = 'public/uploads/brand/';

            if ($get_image) {
                // Lấy tên ảnh
                $get_name_image = $get_image->getClientOriginalName();
                // Sử dụng hàm tách chuỗi
                $name_image = current(explode('.', $get_name_image));
                // Lấy đuôi mở rộng của hình ảnh
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path, $new_image);
                $data['logo']   = $new_image;

                $brand = Brand::find($ma);
                unlink($path.$brand->logo);

                $brand->update($data);
    
                DB::commit();
                Toastr::success('Cập nhật hãng xe thành công','Success');
                return redirect()->route('brand.view_all');
            }

            Brand::find($ma)->update($data);

            DB::commit();
            Toastr::success('Cập nhật hãng xe thành công','Success');
            return redirect()->route('brand.view_all');

        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Cập nhật xe thất bại', 'Error');
            return redirect()->route('brand.view_update');
        }
    }

    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $path = 'public/uploads/brand/';
            $brand = Brand::findOrFail($data['ma']);
            $brand->delete();
            unlink($path.$brand->logo);
            DB::commit();
            Toastr::success('Đã xóa thương hiệu thành công', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Xóa thương hiệu thất bại', 'Error');
        }
    }
}
