<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'xe';
    protected $primaryKey = 'ma';

    protected $fillable = [
        'ten_xe',
        'anh_xe',
        'ma_hang_xe',
        'so_luong',
        'so_luong_da_thue',
        'gia_thue_xe',
        'so_cho_ngoi',
        'tien_phat',
        'tinh_trang',
        'khach_hang_da_dat',
        'mo_ta'
    ];

    public $timestamps = false;

    public function brand(){
        return $this->belongsTo('App\Models\Brand', 'ma_hang_xe');
    }

    public function contacts()
	{
		return $this->hasMany('App\Models\Contract', 'ma_xe', 'ma');
	}
}
