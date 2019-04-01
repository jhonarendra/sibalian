<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbilOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambil_order', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('id_kurir');
            
            $table->unsignedBigInteger('id_user');
            
            $table->string('alamat_pengiriman');

            $table->unsignedBigInteger('id_order_obat');
            
            $table->unsignedBigInteger('id_apotek');

            $table->double('harga');


            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_kurir')->references('id')->on('kurirs');
            $table->foreign('id_order_obat')->references('id')->on('order_obats');
            $table->foreign('id_apotek')->references('id')->on('apoteks');
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
        Schema::dropIfExists('ambil_order');
    }
}
