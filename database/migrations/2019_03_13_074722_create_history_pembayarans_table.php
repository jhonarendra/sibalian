<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->dateTime('tgl_pembayaran');
            $table->unsignedBigInteger('id_detail_konsul');
            $table->foreign('id_detail_konsul')->references('id')->on('detail_konsultasis');
            $table->unsignedBigInteger('id_order_obat');
            $table->foreign('id_order_obat')->references('id')->on('order_obats');
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
        Schema::dropIfExists('history_pembayarans');
    }
}
