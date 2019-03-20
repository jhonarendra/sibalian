<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteKurirsTabl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('order_obats', function (Blueprint $table) {
            $table->dropForeign(['id_kurir']);
            if (Schema::hasColumn('order_obats','id_kurir')) {
                //
               
                $table->dropColumn('id_kurir');

                
            }
            if (Schema::hasColumn('order_obats','id_dokter')) {
                //
              
                $table->dropForeign(['id_dokter']);
                $table->dropColumn('id_dokter');

                
            }
            if (Schema::hasColumn('order_obats','resep_dokter')) {
             
                $table->dropColumn('resep_dokter');

                
            }
            if (Schema::hasColumn('order_obats','bukti_pembayaran')) {
                //

                $table->dropColumn('bukti_pembayaran');
                
            }

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

    }
}
