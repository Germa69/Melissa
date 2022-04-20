<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HangXe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hang_xe', function (Blueprint $table){
            $table->increments('ma');
            $table->string('ten_hang_xe', 50);
            $table->string('logo', 100)->nullable();
            $table->string('quoc_gia', 50);
            $table->integer('nam_thanh_lap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hang_xe');
    }
}
