<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'hang_xe';
    protected $primaryKey = 'ma';

    protected $fillable = [
        'ten_hang_xe',
        'logo'
    ];

    public $timestamps = false;

    public function cars(){
        return $this->hasMany('App\Models\Car', 'ma_hang_xe', 'ma');
    }
}
