<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotoColumnPelanggaranSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelanggaran', function (Blueprint $table) {
            $table->enum('kategori',['ringan','sedang','berat'])->default('ringan');
            $table->string('sanksi')->nullable();
        });

        Schema::table('pelanggaran_siswa', function (Blueprint $table) {
            $table->string('foto')->nullable();
            $table->timestamp('tanggal_konseling')->nullable();
            $table->boolean('tindak_lanjut')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelanggaran', function (Blueprint $table) {
            $table->dropColumn('kategori');
            $table->dropColumn('sanksi');
        });

        Schema::table('pelanggaran_siswa', function (Blueprint $table) {
            $table->dropColumn('foto');
            $table->dropColumn('tanggal_konseling');
            $table->dropColumn('tindak_lanjut');
        });
    }
}
