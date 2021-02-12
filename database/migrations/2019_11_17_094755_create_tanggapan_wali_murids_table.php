<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggapanWaliMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan_wali_murid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_pelanggaran_siswa')->unsigned();
            $table->bigInteger('id_wali_murid')->unsigned();
            $table->text('tanggapan')->nullable();
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
        Schema::dropIfExists('tanggapan_wali_murid');
    }
}
