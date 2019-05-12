<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_desa');
            $table->string('slug');
            $table->text('deskripsi');
            $table->text('peta')->nullable();
            $table->string('alamat');
            $table->string('email')->unique();
            $table->string('telepon')->nullable();
            $table->string('status_desa');
            $table->integer('user_limit')->default(1);
            $table->integer('limit_kegiatan')->default(10);
            $table->softDeletes();
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
        Schema::dropIfExists('desa');
    }
}
