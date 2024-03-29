<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TABELA -> episodios
        Schema::create('episodios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->integer('temporada_id');
            $table->timestamps();  //mantém histórico de quando foi inserido/alterado

            //temporada_id tem referência com temporada_id da tabela temporadas
            $table->foreign('temporada_id')->references('id')->on('temporadas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodios');
    }
}
