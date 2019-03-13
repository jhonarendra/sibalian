<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_obats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id')->on('pasiens');
            $table->unsignedBigInteger('id_kurir');
            $table->foreign('id_kurir')->references('id')->on('kurirs');
            $table->unsignedBigInteger('id_dokter');
            $table->foreign('id_dokter')->references('id')->on('dokters');
            $table->text('resep_dokter');
            $table->integer('total');
            $table->enum('status', ['lunas', 'belum_lunas']);
            $table->text('bukti_pembayaran');
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
        Schema::dropIfExists('order_obats');
    }
}
