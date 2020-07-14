<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlocacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alocacoes', function (Blueprint $table) {
            $table->unsignedBigInteger('filmes_id')->unsigned();
            $table->foreign('filmes_id')->references('id')->on('filmes');
            $table->unsignedBigInteger('diretores_id')->unsigned();
            $table->foreign('diretores_id')->references('id')->on('diretores');
            $table->unsignedBigInteger('atores_id')->unsigned();
            $table->foreign('atores_id')->references('id')->on('atores');
            $table->timestamps();
            $table->primary(array('filmes_id', 'diretores_id', 'atores_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alocacoes');
    }
}
