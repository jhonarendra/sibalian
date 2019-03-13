<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailOrderObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_order_obats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_detail_obat');
            $table->foreign('id_detail_obat')->references('id')->on('detail_obats');
            $table->unsignedBigInteger('id_order_obat');
            $table->foreign('id_order_obat')->references('id')->on('order_obats');
            $table->integer('jumlah_obat');
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
        Schema::dropIfExists('detail_order_obats');
    }
}
