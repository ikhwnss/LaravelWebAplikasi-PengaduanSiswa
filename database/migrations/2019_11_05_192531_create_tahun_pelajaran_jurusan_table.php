<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunPelajaranJurusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahun_pelajaran_jurusan', function (Blueprint $table) {
            $table->bigInteger('id_tahun_pelajaran')->unsigned();
            $table->bigInteger('id_jurusan')->unsigned();
            $table->foreign('id_tahun_pelajaran')->references('id')->on('tahun_pelajaran')->onDelete('cascade');
            $table->foreign('id_jurusan')->references('id')->on('jurusan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tahun_pelajaran_jurusan', function(Blueprint $table){
            $table->dropForeign('id_tahun_pelajaran');
            $table->dropForeign('id_jurusan');
        });
        Schema::dropIfExists('tahun_pelajaran_jurusan');
    }
}
