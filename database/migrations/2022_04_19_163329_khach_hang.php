<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KhachHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khach_hang', function (Blueprint $table){
            $table->increments('ma');
            $table->string('ten', 50);
            $table->string('anh_khach_hang', 100)->nullable();
            $table->string('email', 100)->unique();
            $table->string('mat_khau', 100);
            $table->string('dia_chi', 100);
            $table->string('so_CMND', 100)->unique();
            $table->char('sdt', 20);
            $table->integer('tinh_trang')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khach_hang');
    }
}
