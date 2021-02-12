<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_jurusan')->unsigned();
            $table->foreign('id_jurusan')->references('id')->on('jurusan')->onDelete('cascade');
            $table->string('nama');
            $table->text('detail')->nullable();
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
        Schema::table('kelas', function(Blueprint $table){
            $table->dropForeign('id_jurusan');
        });

        Schema::dropIfExists('kelas');
    }
}
