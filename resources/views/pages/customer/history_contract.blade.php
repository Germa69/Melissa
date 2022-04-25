<div class="row" style="margin-bottom: 40px">
    <div class="col col-lg-4 col-md-6 col-sm-12 resetDate" style="margin-bottom: 10px">
        <label for="users-list-verified">Từ ngày</label>
        <div class="input-field">
            <input type="text" name="ngay_thue" id="ngay_thue" class="form-control" placeholder="yyyy-mm-dd"
                data-input>
        </div>
    </div>
    <div class="col col-lg-4 col-md-6 col-sm-12 resetDate" style="margin-bottom: 10px">
        <label for="users-list-role">Đến ngày</label>
        <div class="input-field">
            <input type="text" name="ngay_tra" id="ngay_tra" class="form-control" placeholder="yyyy-mm-dd" data-input>
        </div>
    </div>
    <div class="col col-lg-3 col-md-6 col-sm-12" style="margin-bottom: 10px">
        <label for="users-list-status">Trạng thái</label>
        <div class="input-field">
            <select class="select2 browser-default form-control" style="width: fit-content !important;" name="tinh_trang"
                id="tinh_trang">
                <option value="" selected disabled>Chọn trạng thái</option>
                <option value="1">Đang chờ duyệt</option>
                <option value="2">Đã duyệt | Đang cho thuê</option>
                <option value="3">Hủy hợp đồng</option>
            </select>
        </div>
    </div>
    <div class="col col-lg-1 col-md-6 col-sm-12" style="margin-bottom: 10px">
        <button type="button" class="btn btn-primary" id="filter" style="margin-top: 25px; height: 35px;">Lọc</button>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="contractd">
            <div class="contractd-body">
                <div class="table-responsive">
                    <table id="contractTable" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên khách hàng</th>
                                <th>Tên xe</th>
                                <th>Ngày thuê</th>
                                <th>Ngày trả</th>
                                <th>Tình trạng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
