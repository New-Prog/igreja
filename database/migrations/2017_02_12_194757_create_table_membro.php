<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMembro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Definindo tabelas para o sistema.
        Schema::create('membro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->char('sexo', 1);
            $table->char('cpf', 11);
            $table->string('email', 255);
            $table->integer('tipo');
            $table->string('telefone', 20);
            $table->string('celular', 20);
            $table->timestamps();
            // $table->integer('id_celula');
            // $table->integer('id_endereco');
            // $table->integer('id_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('membro');
    }
}
