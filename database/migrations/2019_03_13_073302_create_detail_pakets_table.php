<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_dokter');
            $table->foreign('id_dokter')->references('id')->on('dokters');
            $table->integer('harga');
            $table->unsignedBigInteger('id_paket');
            $table->foreign('id_paket')->references('id')->on('paket_bayars');
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
        Schema::dropIfExists('detail_pakets');
    }
}
