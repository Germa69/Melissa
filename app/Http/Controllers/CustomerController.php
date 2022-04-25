<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Customer;
use App\Models\Contract;
use App\Models\Car;

class CustomerController
{
    public function view_all(){
        $customers = Customer::all();

        return view('admin.customer.view_all',[
            'customers' => $customers,
        ]);
    }

    public function active($ma)
    {
        try {
            $customer = Customer::find($ma);
            $customer->tinh_trang = 0;
            $customer->save();
            DB::commit();
            Toastr::success('Cập nhật tình trạng thành công', 'Success');
            return redirect()->route('customer.view_all');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Cập nhật tình trạng thất bại', 'Error');
            return redirect()->route('customer.view_all');
        }
    }

    public function inactive($ma)
    {
        try {
            $customer = Customer::find($ma);
            $customer->tinh_trang = 1;
            $customer->save();
            DB::commit();
            Toastr::success('Cập nhật tình trạng thành công', 'Success');
            return redirect()->route('customer.view_all');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Cập nhật tình trạng thất bại', 'Error');
            return redirect()->route('customer.view_all');
        }
    }

    public function login() {
        return view('pages.customer.login');
    }

    public function process_login(Request $rq){
        $customer = Customer::where('email', $rq->email)->first();

        if (!empty($customer) && Hash::check($rq->mat_khau, $customer->mat_khau)) {
            if ($customer->tinh_trang == 0) {
                Toastr::error('Tài khoản tạm thời bị khóa', 'Error');
                return redirect()->route('home_page');
            } else {
                Session::put('ma_khach_hang', $customer->ma);
                Session::put('ten_khach_hang', $customer->ten);
                Session::put('anh_khach_hang', $customer->anh_khach_hang);
                Session::put('so_dien_thoai', $customer->sdt);
                Session::put('dia_chi', $customer->dia_chi);
                Session::put('so_CMND', $customer->so_CMND);

                Toastr::success('Đăng nhập thành công', 'Success');
                return redirect()->route('home_page');
            }
        }
        else{
            Toastr::error('Email hoặc mật khẩu của bạn đã sai hoặc không tồn tại', 'Error');
            return redirect()->route('customer.login');
        }
    }

    public function logout(){
        Session::flush();
        Toastr::success('Đã đăng xuất rồi đếy', 'Success');
        return redirect()->route('home_page');
    }

    public function register()
    {
        return view('pages.customer.register');
    }

    public function process_register(Request $rq)
    {
        if ($rq->isMethod("POST")) {
            try {
                DB::beginTransaction();
                $data = array();

                $data['ten'] = $rq->ten;
                $data['email'] = $rq->email;
                $data['dia_chi'] = $rq->dia_chi;
                $data['sdt'] = $rq->sdt;
                $data['so_CMND'] = $rq->so_CMND;
                $data['mat_khau'] = Hash::make($rq->mat_khau);

                $get_image = $rq->file('file');
                $path         = 'public/uploads/customer/';

                if($get_image) {
                    // Lấy tên ảnh
                    $get_name_image = $get_image->getClientOriginalName();
                    // Sử dụng hàm tách chuỗi
                    $name_image = current(explode('.', $get_name_image));
                    // Lấy đuôi mở rộng của hình ảnh
                    $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                    $get_image->move($path, $new_image);
                    $data['anh_khach_hang']   = $new_image;
                }

                Customer::create($data);

                DB::commit();
                Toastr::success('Đăng ký tài khoản thành công', 'Success');
                return redirect()->route('home_page');
            } catch (\Throwable $th) {
                DB::rollBack();
                unlink($path.$new_image);
                Toastr::error('Đăng ký tài khoản thất bại', 'Error');
                return redirect()->route('customer.register');
            }
        } else {
            Toastr::warning('Phương thức truyền vào không đúng', 'Warning');
            return redirect()->route('customer.register');
        }
    }

    public function profile(Request $rq, $ma)
    {
        $profile = Customer::find($ma);
        $contract = Contract::find($ma);

        if ($rq->ajax()) {
            $ngay_thue    = $rq->ngay_thue;
            $ngay_tra     = $rq->ngay_tra;
            $tinh_trang   = $rq->tinh_trang;

            if (!empty($ngay_thue) && !empty($ngay_tra) && !empty($tinh_trang)) {
                $contracts = Contract::with('car')
                ->with('customer')
                ->whereBetween('ngay_thue', [$ngay_thue, $ngay_tra])
                ->where('tinh_trang', $tinh_trang)
                ->Where('ma_khach_hang', $ma)
                ->get();
            } else if (!empty($ngay_thue) && !empty($ngay_tra)) {
                $contracts = Contract::with('car')
                ->with('customer')
                ->whereBetween('ngay_thue', [$ngay_thue, $ngay_tra])
                ->Where('ma_khach_hang', $ma)
                ->get();
            } else if (!empty($tinh_trang)) {
                $contracts = Contract::with('car')
                ->with('customer')
                ->where('tinh_trang', $tinh_trang)
                ->Where('ma_khach_hang', $ma)
                ->get();
            } else {
                $contracts = Contract::with('car')
                ->with('customer')
                ->Where('ma_khach_hang', $ma)
                ->get();
            }

            return datatables()->of($contracts)
                ->addIndexColumn()
                ->addColumn('action', function ($contract) {
                    $output = '';

                    $output.='
                    <div style="display: flex; justify-content: space-evenly">
                        <button type="button"
                            class="btn btn-primary btn-sm showContract" onclick="handleShowContract('.$contract->ma.')">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        ';
                        if ($contract->tinh_trang == 2){
                            $output.='
                                <button type="button"
                                    class="btn btn-danger btn-sm cancelContract" onclick="handleCancelContract('.$contract->ma.')">
                                    <i class="fa fa-remove" aria-hidden="true"></i>
                                </button>
                            ';
                        }else{
                            $output.='';
                        }
                        $output.='
                    </div>
                ';
                    return $output;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.customer.profile', [
            'profile' => $profile,
            'contract' => $contract
        ]);
    }

    public function profile_update(Request $rq, $ma)
    {
        if ($rq->isMethod("POST")) {
            try {
                DB::beginTransaction();

                $customer = Customer::find($ma);
                $customer->update($rq->all());
                DB::commit();
                Toastr::success('Cập nhật thông tin thành công', 'Success');
                return redirect()->route('customer.profile', [$ma]);

            } catch (\Throwable $th) {
                DB::rollBack();
                Toastr::error('Cập nhật thông tin thất bại', 'Error');
                return redirect()->route('customer.profile', [$ma]);
            }
        } else {
            Toastr::warning('Phương thức truyền vào không đúng', 'Warning');
            return redirect()->route('customer.profile', [$ma]);
        }
    }

    public function password_update(Request $rq, $ma)
    {
        if ($rq->isMethod("POST")) {
            try {
                DB::beginTransaction();

                if ($rq->mat_khau == $rq->nhap_lai_mat_khau) {
                    $customer = Customer::find($ma);
                    $data = [
                        "mat_khau" => Hash::make($rq->mat_khau),
                    ];
                    $customer->update($data);
                    DB::commit();
                    Toastr::success('Cập nhật mật khẩu thành công', 'Success');
                    return redirect()->route('customer.profile', [$ma]);
                } else {
                    Toastr::warning('Mật khẩu nhập lại không khớp', 'Warning');
                    return redirect()->route('customer.profile', [$ma]);
                }

            } catch (\Throwable $th) {
                DB::rollBack();
                Toastr::error('Cập nhật mật khẩu thất bại', 'Error');
                return redirect()->route('customer.profile', [$ma]);
            }
        } else {
            Toastr::warning('Phương thức truyền vào không đúng', 'Warning');
            return redirect()->route('customer.profile', [$ma]);
        }
    }

    public function image_update(Request $rq) {
        try {
            DB::beginTransaction();
            $data = array();
            $get_image = $rq->file('file');
            $ma = $rq->get('ma');
            $path         = 'public/uploads/customer/';

            if($get_image) {
                // Lấy tên ảnh
                $get_name_image = $get_image->getClientOriginalName();
                // Sử dụng hàm tách chuỗi
                $name_image = current(explode('.', $get_name_image));
                // Lấy đuôi mở rộng của hình ảnh
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path, $new_image);
                $data['anh_khach_hang']   = $new_image;

                $customer = Customer::find($ma);
                unlink($path.$customer->anh_khach_hang);

                $customer->update($data);
                DB::commit();
                Toastr::success('Cập nhật ảnh đại diện thành công', 'Success');
            }

            Customer::find($ma)->update($data);
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Cập nhật ảnh đại diện thất bại', 'Error');
        }
    }

    public function cancel_status_contract(Request $rq)
    {
        $data = $rq->all();

        $contract               = Contract::find($data['ma']);
        $contract->tinh_trang   = $data['contract_status'];
        $contract->ly_do        = $data['reason'];
        $contract->save();

        $car                    = Car::find($data['car_id']);

        $khach_hang_da_dat      = $car->khach_hang_da_dat;

        $length = strlen($khach_hang_da_dat);

        if ($length > 0) {
            $result = substr($khach_hang_da_dat, 0, -2);
        }

        $car->khach_hang_da_dat = $result;

        $car_qty                = $car->so_luong;
        $car_qty_rent           = $car->so_luong_da_thue;

        $car_remain             = $car_qty  + $data['qty'];
        $car->so_luong          = $car_remain;
        $car->so_luong_da_thue  = $car_qty_rent - $data['qty'];
        $car->save();
    }
}

