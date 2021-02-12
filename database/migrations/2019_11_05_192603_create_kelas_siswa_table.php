<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_tahun_pelajaran')->unsigned();
            $table->bigInteger('id_kelas')->unsigned();
            $table->bigInteger('id_siswa')->unsigned();
            $table->foreign('id_tahun_pelajaran')->references('id')->on('tahun_pelajaran')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
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
        Schema::table('kelas_siswa', function(Blueprint $table){
            $table->dropForeign('id_tahun_pelajaran');
            $table->dropForeign('id_kelas');
            $table->dropForeign('id_siswa');
        });
        Schema::dropIfExists('kelas_siswa');

    }
}
