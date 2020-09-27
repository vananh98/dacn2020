<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detailsoder', function (Blueprint $table) {
            $table->integer('quantity')->after('id_product');
            $table->decimal('price')->after('quantity');
            $table->decimal('total')->after('price');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->string('description')->after('highlight');
            $table->integer('review')->default(0)->after('highlight');
        });  
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('column');
    }
}
