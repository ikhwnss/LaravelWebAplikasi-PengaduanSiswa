<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali_murid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_depan');
            $table->string('nama_belakang')->nullable();
            $table->char('nomor_telepon')->nullable();
            $table->text('alamat_rumah')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('wali_murid');
    }
}
