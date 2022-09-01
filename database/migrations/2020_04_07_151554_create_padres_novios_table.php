<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadresNoviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padres_novios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres_p_novio')->nullable();
            $table->string('apellidos_p_novio')->nullable();
            $table->string('nombres_m_novio')->nullable();
            $table->string('apellidos_m_novio')->nullable();
            $table->string('nombres_p_novia')->nullable();
            $table->string('apellidos_p_novia')->nullable();
            $table->string('nombres_m_novia')->nullable();
            $table->string('apellidos_m_novia')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('padres_novios');
    }
}
