<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->collation= 'utf8mb4_unicode_ci';
            $table->id('MaSP');
            $table->string('TenSP');
            $table->string('Hinh');
            $table->string('Gia');
            $table->integer('SoLuong');
            $table->integer('KhuyenMai')->nullable()->default(0);
            $table->integer('Mota',600)->default(0);
            $table->string('Gia');
            $table->timestamps();
            $table->bigInteger('FK_MaLoai')->unsigned();
            $table->bigInteger('FK_MaTH')->unsigned();
            $table->foreign('FK_MaLoai')->references('MaLoai')->on('danhmuc');
            $table->foreign('FK_MaTH')->references('MaTH')->on('thuonghieu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
