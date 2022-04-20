<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Car;
use App\Models\Brand;

class CarController
{
    public function view_all(){
        $cars = Car::with('brand')->get();

        return view('admin.car.view_all', [
            'cars' => $cars,
        ]);
    }

    public function view_insert(){
        $brands = Brand::all();

        return view('admin.car.view_insert', [
            'brands'=> $brands
        ]);

    }
    public function process_insert(Request $rq)
    {
        if ($rq->isMethod("POST")) {
            try {
                DB::beginTransaction();
                $data = array();

                $data['ten_xe'] = $rq->ten_xe;
                $data['ma_hang_xe'] = $rq->ma_hang_xe;
                $data['gia_thue_xe'] = $rq->gia_thue_xe;
                $data['so_cho_ngoi'] = $rq->so_cho_ngoi;
                $data['tien_phat'] = $rq->tien_phat;
                $data['tinh_trang'] = $rq->tinh_trang;
                $data['mo_ta'] = $rq->mo_ta;

                $get_image = $rq->file('file');
                $path         = 'public/uploads/car/';

                if($get_image) {
                    // Lấy tên ảnh
                    $get_name_image = $get_image->getClientOriginalName();
                    // Sử dụng hàm tách chuỗi
                    $name_image = current(explode('.', $get_name_image));
                    // Lấy đuôi mở rộng của hình ảnh
                    $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                    $get_image->move($path, $new_image);
                    $data['anh_xe']   = $new_image;
                }
        
                Car::create($data);

                DB::commit();
                Toastr::success('Thêm xe thành công', 'Success');
                return redirect()->route('car.view_all');
            } catch (\Throwable $th) {
                DB::rollBack();
                unlink($path.$new_image);
                Toastr::error('Thêm xe thất bại', 'Error');
                return redirect()->route('car.view_all');
            }
        } else {
            Toastr::warning('Phương thức truyền vào không đúng', 'Warning');
            return redirect()->route('car.view_insert');
        }
    }

    public function view_update($ma)
    {
        $car =  Car::find($ma);
        $brands = Brand::all();

        return view('admin.car.view_update', [
            'car' => $car, 
            'brands' => $brands
        ]);
    }

    public function process_update(Request $rq, $ma)
    {
        try {
            DB::beginTransaction();
            $data = array();

            $data['ten_xe'] = $rq->ten_xe;
            $data['ma_hang_xe'] = $rq->ma_hang_xe;
            $data['gia_thue_xe'] = $rq->gia_thue_xe;
            $data['so_cho_ngoi'] = $rq->so_cho_ngoi;
            $data['tien_phat'] = $rq->tien_phat;
            $data['tinh_trang'] = $rq->tinh_trang;
            $data['mo_ta'] = $rq->mo_ta;

            $get_image = $rq->file('file');
            $path         = 'public/uploads/car/';

            if ($get_image) {
                // Lấy tên ảnh
                $get_name_image = $get_image->getClientOriginalName();
                // Sử dụng hàm tách chuỗi
                $name_image = current(explode('.', $get_name_image));
                // Lấy đuôi mở rộng của hình ảnh
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path, $new_image);
                $data['anh_xe']   = $new_image;

                $car = Car::find($ma);
                unlink($path.$car->anh_xe);

                $car->update($data);
    
                DB::commit();
                Toastr::success('Cập nhật xe thành công','Success');
                return redirect()->route('car.view_all');
            }

            Car::find($ma)->update($data);
            DB::commit();
            Toastr::success('Cập nhật xe thành công','Success');
            return redirect()->route('car.view_all');

        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Thêm xe thất bại', 'Error');
        }
    }

    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $path = 'public/uploads/car/';
            $car = Car::findOrFail($data['ma']);
            $car->delete();
            unlink($path.$car->anh_xe);
            DB::commit();
            Toastr::success('Xóa thương hiệu thành công', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Xóa thương hiệu thất bại', 'Error');
        }
    }

    public function car_detail()
    {
        return view('pages.car.car_detail');
    }
}
