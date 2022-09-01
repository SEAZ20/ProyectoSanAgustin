<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadrinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padrinos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_padrino');
            $table->string('apellidos_padrino');
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('sacramento_id');
            $table->foreign('persona_id')->references('id')->on('persona');
            $table->foreign('sacramento_id')->references('id')->on('sacramentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('padrinos');
    }
}
