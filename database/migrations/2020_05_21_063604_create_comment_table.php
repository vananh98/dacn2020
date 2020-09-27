<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanxet', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation= 'utf8mb4_unicode_ci';
            $table->id('MaCMT');
            $table->bigInteger('Fk_MaKH')->unsigned();
            $table->bigInteger('FK_MaSP')->unsigned();
            $table->foreign('Fk_MaKH')->references('id')->on('taikhoan');
            $table->foreign('FK_MaSP')->references('id')->on('sanpham');
            $table->string('Noidung',500);
            $table->string('Trangthai',10);
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
        Schema::dropIfExists('nhanxet');
    }
}
