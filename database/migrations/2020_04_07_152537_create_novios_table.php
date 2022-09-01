<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres_novio');
            $table->string('apellidos_novio');
            $table->string('nombres_novia');
            $table->string('apellidos_novia');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('padres_novios_id');
            $table->foreign('padres_novios_id')->references('id')->on('padres_novios');
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
        Schema::dropIfExists('novios');
    }
}
