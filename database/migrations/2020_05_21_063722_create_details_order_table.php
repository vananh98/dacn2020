<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->id('STT');
            $table->bigInteger('FK_MaDH')->unsigned();
            $table->bigInteger('FK_MaSP')->unsigned();
            $table->foreign('FK_MaDH')->references('id')->on('donhang');
            $table->foreign('FK_MaSP')->references('id')->on('sanpham');
            $table->decimal('Gia');
            $table->decimal('Tong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietdonhang');
    }
}
