<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteIdPasienOnKonsultasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('konsultasis', function(Blueprint $table) {
            if (Schema::hasColumn('konsultasis','id_pasien')) {
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
        // Schema::table('konsultasis', function(Blueprint $table) {
            // $table->dropColumn('id_pasien');
            // $table->dropColumn('id_pasien');
        // });
    }
}
