<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterCekLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_cek_lab', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('id_pasien');

            $table->unsignedInteger('id_tarif');

            $table->dateTime('tgl_cek_lab');
            $table->enum('status_pembayaran',[0,1]);
            $table->string('hasil_lab');

            $table->foreign('id_pasien')->references('id')->on('users');
            $table->foreign('id_tarif')->references('id')->on('tarif_cek_lab');

            
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
        Schema::dropIfExists('register_cek_lab');
    }
}
