<div class="modal fade" id="modal-show-contract-{{ $contract->ma }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="display: flex">
                <h4 class="modal-title" id="userCrudModal" style="flex: 1">Xem chi tiết hợp đồng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <div style="display: flex">
                    <div style="width: 30%;">
                        <p>Mã hợp đồng</p>
                        <p>Ngày thuê</p>
                        <p>Ngày trả</p>
                        <p>Số ngày thuê</p>
                        @if ($contract->so_ngay_tre_hen != 0)
                            <p>
                                Ngày trả thực tế
                            </p>
                            <p>
                                Số ngày trễ hẹn
                            </p>
                        @else
                        @endif
                        <p>Giá thuê xe</p>
                        <p>Số lượng</p>
                        <p>Tiền cọc</p>
                        <p>Tiền phạt</p>
                        <p>Tình trạng</p>
                    </div>
                    <div style="width: 35%">
                        <p>#{{ $contract->ma }}</p>
                        <p>{{ \Carbon\Carbon::parse($contract->ngay_thue)->format('d/m/Y') }}</p>
                        <p>{{ \Carbon\Carbon::parse($contract->ngay_tra)->format('d/m/Y') }}</p>
                        <p>{{ $contract->so_ngay_thue }}</p>
                        @if ($contract->so_ngay_tre_hen != 0)
                            <p>
                                {{ \Carbon\Carbon::parse($contract->ngay_tra_thuc_te)->format('d/m/Y') }}
                            </p>
                            <p>
                                {{ $contract->so_ngay_tre_hen }}
                            </p>
                        @else
                        @endif
                        <p>{{ number_format($contract->gia_thue_xe, 0, ',', '.') }} VNĐ</p>
                        <p>{{ $contract->so_luong }}</p>
                        <p>{{ number_format($contract->tien_coc, 0, ',', '.') }} VNĐ</p>
                        <p>{{ number_format($contract->tien_phat, 0, ',', '.') }} VNĐ</p>
                        <p>
                            @if ($contract->tinh_trang == 1)
                                <span class="badge light badge-warning">Đang chờ duyệt</span>
                            @elseif ($contract->tinh_trang == 2)
                                <span class="badge light badge-success">Đã duyêt | Đang cho thuê</span>
                            @elseif ($contract->tinh_trang == 3)
                                <span class="badge light badge-danger">Hủy hợp đồng</span>
                            @endif
                        </p>
                    </div>
                    <div>
                        <img src="{{ asset('public/uploads/car/'.$contract->car->anh_xe) }}" alt="" width="185px">
                        <p style="margin-top: 20px">Tên xe: {{ $contract->car->ten_xe }}</p>
                        <p>Số chỗ ngồi: {{ $contract->car->so_cho_ngoi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
