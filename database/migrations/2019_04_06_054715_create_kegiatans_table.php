<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('desa_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('judul_kegiatan');
            $table->text('isi_kegiatan');
            $table->text('foto_kegiatan');
            $table->timestamps();

            $table->foreign('desa_id')->references('id')->on('desa');
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
