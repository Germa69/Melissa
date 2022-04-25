<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'hop_dong';
    protected $primaryKey = 'ma';
    protected $fillable = [
        'ma_khach_hang',
        'ma_xe',
        'ngay_thue',
        'ngay_tra',
        'ngay_tra_thuc_te',
        'so_luong',
        'so_ngay_thue',
        'so_ngay_tre_hen',
        'gia_thue_xe',
        'tien_phat',
        'tien_coc',
        'tinh_trang',
        'ma_admin',
        'ly_do'
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
