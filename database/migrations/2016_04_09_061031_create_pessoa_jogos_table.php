<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaJogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_jogos', function (Blueprint $table) {
            $table->integer('pessoa_id');
            $table->integer('jogo_id');
            $table->integer('status')->default(1);
            $table->decimal('preco');
            $table->integer('comprador_id')->nullable();
            $table->foreign('comprador_id')->references('id')->on('pessoa');
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
        Schema::drop('pessoa_jogos');
    }
}
