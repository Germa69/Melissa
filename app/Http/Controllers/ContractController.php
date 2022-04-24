<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Car;


class ContractController extends Controller
{
    public function manage_contract(Request $rq){
        if ($rq->ajax()) {
            $ngay_thue    = $rq->ngay_thue;
            $ngay_tra     = $rq->ngay_tra;
            $tinh_trang   = $rq->tinh_trang;

            if (!empty($ngay_thue) && !empty($ngay_tra) && !empty($tinh_trang)) {
                $contracts = Contract::with('car')
                ->with('customer')
                ->whereBetween('ngay_thue', [$ngay_thue, $ngay_tra])
                ->where('tinh_trang', $tinh_trang)
                ->get();
            } else if (!empty($ngay_thue) && !empty($ngay_tra)) {
                $contracts = Contract::with('car')
                ->with('customer')
                ->whereBetween('ngay_thue', [$ngay_thue, $ngay_tra])
                ->get();
            } else if (!empty($tinh_trang)) {
                $contracts = Contract::with('car')
                ->with('customer')
                ->where('tinh_trang', $tinh_trang)
                ->get();
            } else {
                $contracts = Contract::with('car')
                ->with('customer')
                ->get();
            }

            return datatables()->of($contracts)
                ->addIndexColumn()
                ->addColumn('action', function ($contract) {
                    return
                        '<a href="'. route('contract.update_contract', ['ma' => $contract->ma]) .'" class="text-white">
                            <button type="button" class="btn btn-grd-primary btn-sm">
                                <i class="fa fa-edit" style="font-size: 24px"></i>
                            </button>
                        </a>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.contract.manage_contract');
    }

    public function update_contract($ma)
    {
        $contract = Contract::find($ma);
        $customer_id = $contract->ma_khach_hang;
        $car_id = $contract->ma_xe;
        $customer = Customer::where('ma', $customer_id)->first();
        $car = Car::where('ma', $car_id)->first();

        return view('admin.contract.update_contract', [
            'contract' => $contract,
            'customer' => $customer,
            'car' => $car,
        ]);
    }

    public function confirm_booking(Request $rq) {
        $data = $rq->all();

        $checkCusCar = Car::where([
            ['ma', $data['ma_xe']],
            ['khach_hang_da_dat', 'LIKE', '%'.$data['ma_khach_hang'].'%'],
        ])->first();

        if ($checkCusCar) {
            Toastr::error('Bạn đang có hợp đồng xe này, vui lòng trả xe để có thể thuê xe', 'Error');
        } else {
            $contract = new Contract();
            $contract->ma_khach_hang = $data['ma_khach_hang'];
            $contract->ma_xe = $data['ma_xe'];
            $contract->ngay_thue = $data['ngay_thue'];
            $contract->ngay_tra = $data['ngay_tra'];
            $contract->so_luong = $data['so_luong'];
            $contract->so_ngay_thue = $data['so_ngay_thue'];
            $contract->gia_thue_xe = $data['gia_thue_xe'];
            $contract->tien_phat = $data['tien_phat'];
            $contract->tien_coc = $data['tien_coc'];
            $contract->save();
            Toastr::success('Bạn đã đặt xe thành công', 'Success');
        }
    }

    public function update_status_contract(Request $rq)
    {
        $data = $rq->all();

        $contract               = Contract::find($data['contract_id']);
        $contract->tinh_trang   = $data['contract_status'];
        $contract->save();

        if($contract->tinh_trang == 2){
            $car                    = Car::find($data['car_id']);

            $car->khach_hang_da_dat = $data['customer_id'].','.$car->khach_hang_da_dat;

            $car_qty                = $car->so_luong;
            $car_qty_rent           = $car->so_luong_da_thue;

            $car_remain             = $car_qty  - $data['qty'];
            $car->so_luong          = $car_remain;
            $car->so_luong_da_thue  = $car_qty_rent + $data['qty'];
            $car->save();

        } else if ($contract->tinh_trang == 3) {
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

    public function update_date_contract(Request $rq)
    {
        $data = $rq->all();

        $contract                     = Contract::find($data['ma']);
        $contract->ngay_tra_thuc_te   = $data['ngay_tra_thuc_te'];
        $contract->so_ngay_tre_hen    = $data['so_ngay_tre_hen'];
        $contract->save();
    }
}
