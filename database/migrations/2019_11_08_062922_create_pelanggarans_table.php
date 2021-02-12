<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_tata_tertib')->unsigned();
            $table->string('nama');
            $table->text('detail')->nullable();
            $table->integer('poin');
            $table->timestamps();

            $table->foreign('id_tata_tertib')->references('id')->on('tata_tertib')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelanggaran', function(Blueprint $table){
            $table->dropForeign('id_tata_tertib');
        });
        Schema::dropIfExists('pelanggaran');
    }
}
