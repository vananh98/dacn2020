<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePhieuNhapHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieunhaphang', function (Blueprint $table) {
            $table->id();
            $table->string('MaPN',50)->unique();
            $table->bigInteger('Fk_MaNN')->unsigned();
            $table->foreign('FK_MaNN')->references('MaND')->on('taikhoan');
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
        Schema::dropIfExists('phieunhaphang');
    }
}
