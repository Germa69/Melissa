<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Contract;
use App\Models\Car;


class ContractController extends Controller
{
    public function view_all(Request $rq){
        $contracts = Contract::with('car')->with('customer')->get();

        return view('admin.contract.view_all',[
            'contracts' => $contracts,
        ]);
    }

    public function view_insert(){
        $array_hop_dong = Contract::all();
        return 	view('view_hop_dong.view_insert', [
            'array_hop_dong'=> $array_hop_dong
        ]);

    }
    public function process_insert(Request $rq)
    {
        Contract::with('Car')->create([
            'ngay_thue' => $rq->ngay_thue,
            'ngay_tra'=>$rq->ngay_tra,
            'ma_khach_hang'=>$rq->session()->get('ma_khach_hang'),
            'ma_Car'=>$rq->ma_Car,
            'gia_thue_Car'=> Car::find($rq->ma_Car)->gia_thue_Car,
            'tien_phat'=> 0,
            'tinh_trang'=>0,
        ]);
        Car::find($rq->ma_Car)->update(['tinh_trang'=>1]);



        return redirect()->route('view_khach_hang.header')->with('sucsess','Thêm thành công');
    }

    public function delete($ma)
    {
        Contract::find($ma)->delete();
        return redirect()->route('view_hop_dong.view_all')->with('success','Bạn xoá công ty thành công rồi');
    }

    public function view_update($ma)
    {
        $contract = Contract::find($ma);
        return view('admin.contract.view_update', ['contract' => $contract]);
    }

    public function process_update(Request $rq, $ma)
    {
        try {
            DB::beginTransaction();
            Contract::find($ma)->update([
                'ngay_tra_thuc_te' => $rq->ngay_tra_thuc_te,
            ]);
            DB::commit();
            Toastr::success('Cập nhật hợp đồng thành công', 'Success');
            return redirect()->route('contract.view_all');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Cập nhật hợp đồng thất bại', 'Error');
            return redirect()->route('contract.view_all');
        }
    }

    public function approval($ma){
        try {
            DB::beginTransaction();
            Contract::find($ma)->update([
                'tinh_trang' => 1
            ]);
            DB::commit();
            Toastr::success('Duyệt hợp đồng thành công', 'Success');
            return redirect()->route('contract.view_all');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Duyệt hợp đồng thất bại', 'Error');
            return redirect()->route('contract.view_all');
        }
    }

    public function cancel($ma){
        try {
            DB::beginTransaction();
            Contract::find($ma)->update([
                'tinh_trang' => 2
            ]);
            DB::commit();
            Toastr::success('Hủy hợp đồng thành công', 'Success');
            return redirect()->route('contract.view_all');
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::error('Hủy hợp đồng thất bại', 'Error');
            return redirect()->route('contract.view_all');
        }
    }
}
