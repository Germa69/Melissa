<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Car;
use App\Models\Admin;

use PDF;


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
            $contract               = Contract::find($data['contract_id']);
            $contract->ma_admin     = $data['admin_id'];
            $contract->save();

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

    public function print_contract($ma)
    {
        $pdf                    = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_contract_convert($ma));
        return $pdf->stream();
    }

    public function print_contract_convert($ma)
    {
        $contract = Contract::where('ma', $ma)->first();

        $customer_id = $contract->ma_khach_hang;
        $car_id      = $contract->ma_xe;
        $admin_id    = $contract->ma_admin;

        $customer = Customer::find($customer_id);
        $car      = Car::find($car_id);
        $admin    = Admin::find($admin_id);

        $print_contract_css = asset('public/backend/css/print_contract.css');
        $bootstrap_css = asset('public/frontend/css/bootstrap.min.css');

        $output = '';

        $output .= '
            <link rel="stylesheet" type="text/css" href='.$print_contract_css.'>
            <link rel="stylesheet" type="text/css" href='.$bootstrap_css.'>

            <div class="container">
                <p class="title">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
                <p class="title-1">Độc lập - Tự do - Hạnh phúc</p>
                <p class="title-2">HỢP ĐỒNG CHO THUÊ XE</p>
                <br>
                <p class="content">
                    Hợp Đồng dịch vụ cho thuê xe (Sau đây gọi là “Hợp đồng”) được lập tại MELISSA SHOP. vào ngày '.\Carbon\Carbon::parse($contract->ngay_thue)->format('d').' tháng '.\Carbon\Carbon::parse($contract->ngay_thue)->format('m').' năm '.\Carbon\Carbon::parse($contract->ngay_thue)->format('Y').' bởi và giữa các bên như sau:
                </p>
                <p class="content">
                    <strong>BÊN CHO THUÊ XE</strong> (Gọi tắt là bên A):
                </p>
                <p>
                    Họ và tên: '.$admin->ten.'
                </p>
                <p>
                    Địa chỉ: '.$admin->dia_chi.'
                </p>
                <p>
                    Số điện thoại: '.$admin->sdt.'
                </p>
                <p>
                    E-Mail: '.$admin->email.'
                </p>
                <p class="content">
                    <strong>BÊN THUÊ XE</strong> (Gọi tắt là bên B):
                </p>
                <p>
                    Họ và tên: '.$customer->ten.'
                </p>
                <p>
                    Địa chỉ: '.$customer->dia_chi.'
                </p>
                <p>
                    Số điện thoại: '.$customer->sdt.'
                </p>
                <p>
                    E-Mail: '.$customer->email.'
                </p>
                <p>
                    Số CMND: '.$customer->so_CMND.'
                </p>
                <p>
                    Sau khi thỏa thuận, hai bên thống nhất ký kết Hợp đồng với các điều khoản và điều kiện như sau:
                </p>
                <p class="content">
                    <strong>Điều 1. Nội dung hợp đồng</strong>
                </p>
                <p>
                    Bên A đồng ý cho bên B thuê xe đưa đón người của Bên B bằng xe '.$car->ten_xe.'. với số chỗ ngồi là '.$car->so_cho_ngoi.' chỗ.
                    <span>Thời gian thuê từ '.\Carbon\Carbon::parse($contract->ngay_thue)->format('d-m-Y').' đến ngày trả '.\Carbon\Carbon::parse($contract->ngay_tra)->format('d-m-Y').'</span>
                </p>
                <p class="content">
                    <strong>Điều 2. Phí dịch vụ và phương thức thanh toán</strong>
                </p>
                <p>
                    <p class="title-sm">1. Phí dịch vụ</p>
                    <span>
                        - Phí dịch vụ cho các công việc nêu tại Điều 1 là <i style="color: red">'.number_format($contract->gia_thue_xe, 0, ',', '.').' VNĐ</i> / 1 ngày.
                    </span>
                    <span>
                        - Số tiền cọc / 1 xe: <i style="color: red">'.number_format($contract->tien_coc, 0, ',', '.').' VNĐ</i> (Lấy phụ thuộc vào 20% giá trị của xe).
                    </span>
                    <span>
                        - Bảng tính:
                        <table border="1" cellspacing="1" cellpadding="1" width="100%">
                            <thead style="text-align: center">
                                <tr>
                                    <th>Tên xe</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng thuê</th>
                                    <th>Số ngày thuê</th>
                                    <th>Số ngày trễ hẹn</th>
                                    <th>Tiền cọc</th>
                                    <th>Tiền phạt</th>
                                    <th>Tổng phụ</th>
                                </tr>
                            </thead>';

                            $subTotal = $contract->gia_thue_xe * $contract->so_ngay_thue * $contract->so_luong;
                            $deposit = $contract->tien_coc * $contract->so_luong;
                            $mulct = $contract->tien_phat * $contract->so_ngay_tre_hen;
                            $total = $subTotal + $deposit + $mulct;

                            $output.='
                            <tbody style="text-align: center">
                                <tr>
                                    <td>'.$contract->car->ten_xe.'</td>
                                    <td>'.$contract->gia_thue_xe.'</td>
                                    <td>'.$contract->so_luong.'</td>
                                    <td>'.$contract->so_ngay_thue.'</td>
                                    <td>'.$contract->so_ngay_tre_hen.'</td>
                                    <td>'.$contract->tien_coc.'</td>
                                    <td>'.$contract->tien_phat.'</td>
                                    <td>'.$contract->gia_thue_xe * $contract->so_ngay_thue * $contract->so_luong.'</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="5">
                                        <p>
                                            Tổng phụ: [Giá tiền * Số lượng thuê * Số ngày thuê]<br>
                                            Tiền cọc: [Tiền cọc * Số lượng thuê]<br>
                                            Tiền phạt: [Tiền phạt * Số ngày trễ hẹn]<br>
                                        </p>
                                        <h5 class="text-success">
                                            <strong>Tổng tiền</strong>
                                        </h5>
                                    </td>
                                    <td>
                                        <p>
                                            '.number_format($subTotal, 0, ',', '.').' <br>
                                            '.number_format($deposit, 0, ',', '.').' <br>
                                            '.number_format($mulct, 0, ',', '.').' <br>
                                        </p>
                                        <h5 class="text-success">
                                            <strong>
                                                '.number_format($total, 0, ',', '.').'
                                            </strong>
                                        </h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </span>
                    <p class="title-sm">2. Phương thức thanh toán</p>
                    <span>
                        - Thanh toán lần 1: Bên A thanh toán cho Bên B 50% khoản phí dịch vụ trong phạm vi 03 ngày kể từ ngày ký Hợp đồng này;
                    </span>
                    <span>
                        - Thanh toán lần 2: Bên A thanh toán khoản phí dịch vụ còn lại cho Bên B trong phạm vi 03 ngày kể từ ngày hoàn thành các công việc tại Điều 1.
                    </span>
                    <span>
                        - Khoản phí dịch vụ trên được thanh toán trực tiếp bằng tiền mặt hoặc chuyển vào tài khoản ngân hàng do Bên B chỉ định tùy từng thời điểm khác nhau.
                    </span>
                    <strong>Điều 3. Trách nhiệm của Bên B</strong>
                    <ul>
                        <li>Trả xe đúng thời gian và địa điểm thỏa thuận tại Điều 1 của Hợp đồng;
                        </li>
                        <li>Đảm bảo chất lượng xe tốt và lái xe an toàn trong quá trình sử dụng.
                        </li>
                        <li>Có trách nhiệm mua bảo hiểm dân sự cho xe và người được vận tải trên xe;
                        </li>
                        <li>Bồi thường thiệt hại cho Bên A nếu gây ra thiệt hại trong quá trình thực hiện các công việc trên;
                        </li>
                        <li>Các nghĩa vụ khác theo quy định của pháp luật hiện hành.
                        </li>
                    </ul>
                    <strong>Điều 4. Trách nhiệm của Bên A</strong>
                    <ul>
                        <li>Thông báo chính xác thời gian và địa điểm đưa, đón cho Bên A trước ít nhất là 2h nếu có sự thay đổi;
                        </li>
                        <li>Thanh toán đầy đủ và đúng hạn khoản phí dịch vụ theo quy định tại Điều 2 cho Bên B;
                        </li>
                        <li>Các nghĩa vụ khác theo quy định của pháp luật.
                        </li>
                    </ul>
                    <strong>Điều 5. Thông báo và xử lý vi phạm hợp đồng</strong>
                    <span>
                    Trong trường hợp Bên A có sự thay đổi kế hoạch do yêu cầu của công việc hoặc do yếu tố khách quan khác mà không thể tiến hành theo đúng thời gian tại Điều 1 thì phải thông báo cho Bên A trước ít nhất là 02 ngày trước ngày tiến hành công việc tại Điều 1 đồng thông báo cho Bên A chính xác thời gian khác sẽ tiến hành các công việc tại Điều 1. Trong trường hợp đã lùi lại thời gian mà Bên A vẫn không thể tiến hành theo đúng thời gian thỏa thuận thì Bên B không phải hoàn trả lại số tiền đã thanh toán trước; </span>
                    <span>Trong trường hợp Bên B không thể bố trí xe và lái xe theo đúng thời gian thỏa thuận tại Điều 1 thì phải thông báo trước cho Bên A ít nhất là 2 ngày trước ngày tiến thành công việc tại Điều 1 đồng thời thỏa thuận lại với Bên A thời gian chính xác để đưa đón Bên A. Nếu Bên B vẫn không thể tiến hành đưa đón Bên A theo đúng thời gian đã thỏa thuận lùi lại thì phải thanh hoàn lại cho Bên A khoản tiền đã thanh toán trước đồng thời bị phạt một khoản tiền bằng với số tiền Bên A đã thanh toán trước.
                    Nếu một trong các bên có sự thay đổi về thời gian theo quy định tại Điều 1 mà không báo trước 2 ngày trước ngày tiến hành công việc thì xử lý như sau: </span>
                    <span>
                        - Bên B phải trả lại Bên A khoản tiền đã thanh toán trước đồng thời bị phạt một khoản tiền bằng với khoản tiền đã đặt trước;
                    </span>
                    <span>
                        - Bên A sẽ không được hoàn lại số tiền đã thanh toán trước.
                    </span>
                    <span>
                        Trong trường hợp việc thay đổi thời gian của một bên mà gây thiệt hay cho bên còn lại (kể cả đã thông báo trước 2 ngày) thì bên có lỗi phải bồi thường thiệt hại do sự thay đổi thời gian.
                        Trong trường hợp Bên B không trả theo đúng thời hạn quy định tại Điều 1 thì phải chịu các chi phí trễ hẹn cho Bên A cho thời gian chậm đón về theo giá thực tế.
                    </span>
                    <strong>Điều 6. Các thỏa thuận khác</strong>
                    <ul>
                        <li>
                            Hai bên cam kết thực hiện đầy đủ các thỏa thuận trong Hợp đồng này.
                        </li>
                        <li>
                            Những nội dung không được thỏa thuận trong Hợp đồng này thì áp dụng các văn bản pháp luật hiện hành có liên quan;
                        </li>
                        <li>
                            Nếu có tranh chấp phát sinh từ Hợp đồng này thì các bên trước hết phải cùng nhau giải quyết bằng thương lượng, hòa giải. Nếu không đạt được sự thương lượng, hòa giải thì mỗi bên có quyền khởi kiện ra tòa án để giải quyết theo thủ tục chung của pháp luật;
                        </li>
                        <li>
                            Hợp đồng này gồm ….. trang, và được lập thành 02 (hai) bản, mỗi bên giữ 01 bản, có giá trị pháp lý như nhau và có hiệu lực từ ngày ký.
                        </li>
                    </ul>
                </p>

                <p>
                    <span style="float: left; margin-left: 40px">
                        ĐẠI DIỆN BÊN A
                    </span>

                    <span style="float: right; margin-right: 40px">
                        ĐẠI DIỆN BÊN B
                    </span>
                </p>
            </div>
        ';

        return $output;
    }
}
