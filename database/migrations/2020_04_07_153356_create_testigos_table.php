<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testigos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres_testigo');
            $table->string('apellidos_testigo');
            $table->boolean('novio_o_novia');
            $table->unsignedBigInteger('novios_id');
            $table->foreign('novios_id')->references('id')->on('novios');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testigos');
    }
}
