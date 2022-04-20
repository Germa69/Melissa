<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'ma';

    protected $fillable = [
        'ten',
        'dia_chi',
        'sdt',
        'avatar',
        'email',
        'mat_khau',
        'tinh_trang',
        'cap_do'
    ];

    public $timestamps = false;
}
