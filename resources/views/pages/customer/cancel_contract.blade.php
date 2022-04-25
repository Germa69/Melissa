<div class="modal fade" id="modal-cancel-contract-{{ $contract->ma }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="display: flex">
                <h4 class="modal-title" id="userCrudModal" style="flex: 1">Hủy hợp đồng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <form>
                    {{ csrf_field() }}
                    <input type="hidden" id="ma" value="{{ $contract->ma }}">
                    <input type="hidden" id="contract_status" value="3">
                    <input type="hidden" id="car_id" value="{{ $contract->ma_xe }}">
                    <input type="hidden" id="customer_id" value="{{ $contract->ma_khach_hang }}">
                    <input type="hidden" id="contract_qty" value="{{ $contract->so_luong }}">

                    <textarea id="reason" cols="10" rows="8" class="form-control" placeholder="Hãy nhập lý do hủy đặt xe..."></textarea>
                    <button type="button" class="btn btn-danger cancel_contract" style="margin-top: 10px">Hủy hợp đồng</button>
                </form>
            </div>
        </div>
    </div>
</div>
