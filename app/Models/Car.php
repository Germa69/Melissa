<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'xe';
    protected $primaryKey = 'ma';

    protected $fillable = [
        'ten_xe',
        'ma_hang_xe',
        'gia_thue_xe',
        'anh_xe',
        'so_cho_ngoi',
        'tinh_trang',
        'tien_phat',
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
