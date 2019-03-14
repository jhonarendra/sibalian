<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrderObatsTableRiwayatPenyakitTableUsersTable extends Migration
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

            $table->unsignedBigInteger('id_user');



     
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('riwayat_penyakits', function (Blueprint $table) {
            if (Schema::hasColumn('riwayat_penyakits','id_pasien')) {
                //
                $table->dropForeign(['id_pasien']);
                $table->dropColumn('id_pasien');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('alamat');
            $table->string('telp',25);
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
