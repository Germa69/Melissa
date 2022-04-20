<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Xe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xe', function (Blueprint $table){
            $table->increments('ma');
            $table->string('ten_xe', 50);
            $table->string('anh_xe', 100);
            $table->unsignedInteger('ma_hang_xe');
            $table->foreign('ma_hang_xe')->references('ma')->on('hang_xe');
            $table->string('gia_thue_xe', 50);
            $table->integer('so_cho_ngoi');
            $table->string('tien_phat', 50);
            $table->integer('tinh_trang')->default('0');
            $table->text('mo_ta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xe');
    }
}
