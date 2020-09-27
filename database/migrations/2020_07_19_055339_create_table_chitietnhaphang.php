<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableChitietnhaphang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietnhaphang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('FK_MaPN')->constrained('phieunhaphang');
            $table->bigInteger('FK_MaSP')->unsigned();
            $table->foreign('FK_MaSP')->references('MaSP')->on('sanpham');
            $table->integer('SoLuong');
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
        Schema::dropIfExists('chitietnhaphang');
    }
}
