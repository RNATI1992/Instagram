<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usu_id')->nullable();
            $table->foreign('usu_id')->references('id')->on('users')->onDelete('set null');;

            $table->unsignedBigInteger('publi_id')->nullable();
            $table->foreign('publi_id')->references('id')->on('publicaciones')->onDelete('set null');;

            $table->longText('contenido');
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
        Schema::dropIfExists('comentarios');
    }
};
