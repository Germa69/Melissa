<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HopDong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hop_dong', function (Blueprint $table){
            $table->increments('ma');
            $table->date('ngay_thue');
            $table->date('ngay_tra');
            $table->unsignedInteger('ma_khach_hang');
            $table->unsignedInteger('ma_xe');
            $table->foreign('ma_khach_hang')->references('ma')->on('khach_hang');
            $table->foreign('ma_xe')->references('ma')->on('xe');
            $table->date('ngay_tra_thuc_te')->nullable();
            $table->string('gia_thue_xe', 50);
            $table->string('tien_phat', 50)->default('0');
            $table->string('tien_coc', 50);
            $table->integer('tinh_trang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hop_dong');
    }
}
