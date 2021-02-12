<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggaranSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggaran_siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_guru')->unsigned();
            $table->bigInteger('id_siswa')->unsigned();
            $table->bigInteger('id_pelanggaran')->unsigned();
            $table->longText('hasil_konseling')->nullable();
            $table->timestamp('tanggal_pelanggaran')->nullable();
            $table->timestamps();

            $table->foreign('id_guru')->references('id')->on('guru')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('id_pelanggaran')->references('id')->on('pelanggaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelanggaran_siswa', function(Blueprint $table){
            $table->dropForeign('id_pelanggaran');
            $table->dropForeign('id_siswa');
            $table->dropForeign('id_guru');
        });

        Schema::dropIfExists('pelanggaran_siswa');
    }
}
