<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailKonsultasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_konsultasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_konsultasi');
            $table->foreign('id_konsultasi')->references('id')->on('konsultasis');
            $table->text('pesan');
            $table->enum('oleh', ['dokter','pasien']);
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
        Schema::dropIfExists('detail_konsultasis');
    }
}
