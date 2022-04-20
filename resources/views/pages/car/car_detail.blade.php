
<div class="modal fade" id="modal-id-{{ $car->ma }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="display: flex">
                <h4 class="modal-title" id="userCrudModal" style="flex: 1">Xem chi tiết xe</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <div style="display: flex">
                    <div style="width: 30%;">
                        <p>Tên xe</p>
                        <p>Hãng xe</p>
                        <p>Quốc gia sản xuất</p>
                        <p>Năm thành lập</p>
                        <p>Số chỗ ngồi</p>
                        <p>Giá thuê xe</p>
                        <p>Tiền phạt</p>
                        <p>Mô tả</p>
                    </div>
                    <div style="width: 35%">
                        <p>{{ $car->ten_xe }}</p>
                        <p>{{ $car->brand->ten_hang_xe }}</p>
                        <p>{{ $car->brand->quoc_gia }}</p>
                        <p>{{ $car->brand->nam_thanh_lap }}</p>
                        <p>{{ $car->so_cho_ngoi }}</p>
                        <p>{{ number_format($car->gia_thue_xe, 0, ',', '.')  }} VNĐ / 1 ngày</p>
                        <p>{{ number_format($car->tien_phat, 0, ',', '.')  }} VNĐ / 1 ngày</p>
                        <p>{{ $car->mo_ta }}</p>
                    </div>
                    <div>
                        <img src="{{ asset('public/uploads/car/'.$car->anh_xe) }}" alt="" width="185px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
