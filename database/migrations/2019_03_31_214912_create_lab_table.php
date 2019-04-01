<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lab');
            $table->string('telepon',25);
            $table->string('alamat');
            $table->string('username');
            $table->string('password');
            $table->text('deskripsi');

            $table->unsignedInteger('id_kabupaten');
            $table->foreign('id_kabupaten')->references('id')->on('kabupaten_kota');
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
        Schema::dropIfExists('lab');
    }
}
