<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaSacramentocomunionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_sacramentocomunion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dia_sa');
            $table->string('mes_sa');
            $table->integer('anio_sa');
            //$table->integer('anio_nac');
            $table->string('ciudad_sa');
            $table->string('ecle_anio');
            $table->string('ecle_tomo');
            $table->string('ecle_pagina');
            $table->string('ecle_no');
            $table->string('civil_anio')->nullable();
            $table->string('civil_tomo')->nullable();
            $table->string('civil_pagina')->nullable();
            $table->string('civil_no')->nullable();
            $table->string('civil_parroquia')->nullable();
            $table->integer('dia_co');
            $table->string('mes_co');
            $table->integer('anio_co');
            $table->string('parroco_comunion');
            $table->string('nota');
            //$table->integer('edad_comunion');
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('sacramento_id');
            $table->foreign('persona_id')->references('id')->on('persona');
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
        Schema::dropIfExists('persona_sacramentocomunion');
    }
}
