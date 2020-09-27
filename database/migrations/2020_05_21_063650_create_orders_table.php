<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->id('MaDH');
            $table->bigInteger('FK_MaKH')->unsigned();
            $table->foreign('FK_MaKH')->references('MaND')->on('taikhoan');
            $table->decimal('Tong');
            $table->string('Trangthai');
            $table->bigInteger('FK_MaShipper')->unsigned();
            $table->foreign('FK_MaShipper')->references('MaND')->on('taikhoan');
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
        Schema::dropIfExists('orders');
    }
}
