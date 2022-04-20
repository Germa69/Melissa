<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table){
            $table->increments('ma');
            $table->string('ten', 50);
            $table->string('dia_chi', 100);
            $table->char('sdt', 20)->unique();
            $table->string('avatar', 100)->nullable();
            $table->string('email', 100)->unique();
            $table->string('mat_khau', 100);
            $table->integer('tinh_trang')->default('1');
            $table->integer('cap_do');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
