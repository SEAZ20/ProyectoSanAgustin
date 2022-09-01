<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoviosSacramentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novios_sacramento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ecle_anio');
            $table->string('ecle_tomo');
            $table->string('ecle_pagina');
            $table->string('ecle_no');
            $table->string('civil_anio')->nullable();
            $table->string('civil_tomo')->nullable();
            $table->string('civil_pagina')->nullable();
            $table->string('civil_no')->nullable();
            $table->string('civil_ciudad')->nullable();
            $table->string('civil_partida')->nullable();
            $table->integer('dia_ma');
            $table->string('mes_ma');
            $table->integer('anio_ma');
            $table->unsignedBigInteger('novios_id');
            $table->unsignedBigInteger('sacramento_id');
            $table->foreign('novios_id')->references('id')->on('novios');
            $table->foreign('sacramento_id')->references('id')->on('sacramentos');
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
        Schema::dropIfExists('novios_sacramento');
    }
}
