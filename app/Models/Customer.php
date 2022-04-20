<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable;
    protected $table = 'khach_hang';
    protected $primaryKey = 'ma';

    protected $fillable = [
        'ten',
        'anh_khach_hang',
        'email',
        'mat_khau',
        'dia_chi',
        'so_CMND',
        'sdt',
        'tinh_trang'
    ];

    public $timestamps = false;
    
    public function contacts(){
        return $this->hasMany('App\Models\Contract', 'ma_khach_hang', 'ma');
    }
}
