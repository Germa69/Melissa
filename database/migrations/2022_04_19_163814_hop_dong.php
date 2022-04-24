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
            $table->unsignedInteger('ma_khach_hang');
            $table->unsignedInteger('ma_xe');
            $table->foreign('ma_khach_hang')->references('ma')->on('khach_hang');
            $table->foreign('ma_xe')->references('ma')->on('xe');
            $table->date('ngay_thue');
            $table->date('ngay_tra');
            $table->date('ngay_tra_thuc_te')->nullable();
            $table->integer('so_luong');
            $table->integer('so_ngay_thue');
            $table->integer('so_ngay_tre_hen')->default('0');
            $table->string('gia_thue_xe', 50);
            $table->string('tien_phat', 50);
            $table->string('tien_coc', 50);
            $table->integer('tinh_trang')->default('1');
            $table->text('ly_do')->nullable();
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
