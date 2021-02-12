<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliMuridSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali_murid_siswa', function (Blueprint $table) {
            $table->bigInteger('id_wali_murid')->unsigned();
            $table->bigInteger('id_siswa')->unsigned();
            $table->foreign('id_wali_murid')->references('id')->on('wali_murid')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wali_murid_siswa', function(Blueprint $table){
            $table->dropForeign('id_wali_murid');
            $table->dropForeign('id_siswa');
        });
        Schema::dropIfExists('wali_murid_siswa');
    }
}
