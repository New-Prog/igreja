<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('membro_cpf');
            $table->string('membro_nome');
            $table->string('membro_sobrenome');
            $table->string('membro_rg');
            $table->date('membro_data_nascimento');
            $table->string('membro_endereco');
            $table->string('membro_cep');
            $table->string('membro_id_celula');
            $table->string('membro_telefone_1');
            $table->string('membro_telefone_2');
            $table->string('membro_tipo');
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
        Schema::dropIfExists('membros');
    }
}
