<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('desa_id')->unsigned();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->string('telepon');
            $table->string('alamat');
            $table->string('role');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('desa_id')->references('id')->on('desa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
