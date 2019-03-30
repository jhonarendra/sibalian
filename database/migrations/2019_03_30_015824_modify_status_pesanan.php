<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyStatusPesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_obats', function (Blueprint $table){
            $table->dropColumn('status');

        });

        Schema::table('order_obats', function (Blueprint $table){
            $table->enum('status', ['belum bayar', 'bayar', 'diproses', 'menunggu ojek', 'dikirim', 'obat sampai', 'selesai', 'pesanan ditolak']);

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_obats', function($table) {
            $table->dropColumn('status');
        });
    }
}
