<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TABELA -> temporadas
        Schema::create('temporadas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->integer('serie_id');
            $table->timestamps();  //mantém histórico de quando foi inserido/alterado

            //serie_id tem referência com serie_id da tabela series
            $table->foreign('serie_id')->references('id')->on('series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporadas');
    }
}
