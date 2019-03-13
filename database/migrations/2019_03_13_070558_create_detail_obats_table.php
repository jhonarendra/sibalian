<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_obats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_obat');
            $table->foreign('id_obat')->references('id')->on('obats');
            $table->unsignedBigInteger('id_apotek');
            $table->foreign('id_apotek')->references('id')->on('apoteks');
            $table->integer('harga');
            $table->integer('stok');
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
        Schema::dropIfExists('detail_obats');
    }
}
