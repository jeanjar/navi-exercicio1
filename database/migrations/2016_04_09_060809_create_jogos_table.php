<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->date('ano_lancamento');
            $table->string('produtora');
            $table->string('estilo');
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
        Schema::drop('jogo');
    }
}
