<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifCekLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarif_cek_lab', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_cek_lab');
            $table->double('harga');
            $table->text('deskripsi');
            $table->unsignedInteger('id_lab');
            $table->enum('status_cek_lab',[0,1]); // 0 artinya harus di lab // 1 artinya bisa dirumah

            $table->foreign('id_lab')->references('id')->on('lab');
            

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
        Schema::dropIfExists('tarif_cek_lab');
    }
}
