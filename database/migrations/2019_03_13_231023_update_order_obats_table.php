<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrderObatsTable extends Migration
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
            if (Schema::hasColumn('order_obats','id_pasien')) {
                //
                $table->dropForeign(['id_pasien']);
                $table->dropColumn('id_pasien');
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
