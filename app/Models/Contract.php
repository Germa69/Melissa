<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'hop_dong';
    protected $primaryKey = 'ma';
    protected $fillable = [
        'ngay_thue',
        'ngay_tra',
        'ngay_tra_thuc_te',
        'gia_thue_xe',
        'tien_phat',
        'ma_xe',
        'ma_khach_hang',
        'tinh_trang'
    ];

    public $timestamps = false;

    public function car()
	{
		return $this->belongsTo('App\Models\Car', 'ma_xe');
	}

	public function customer(){
        return $this->belongsTo('App\Models\Customer', 'ma_khach_hang');
    }
}
