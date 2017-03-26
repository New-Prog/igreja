<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembrosTables extends Migration
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
    		$table->string('nome', 255)->nullable();
    		$table->char('sexo', 1)->nullable();
    		$table->char('cpf', 20)->nullable();
    	
    		$table->string('estado_civil', 12)->nullable();
    		$table->string('dt_nasc', 12)->nullable();
    		$table->string('email', 255)->nullable();
    		$table->string('tipo')->nullable();
    		$table->string('telefone', 20)->nullable();
    		$table->string('celular', 20)->nullable();
    	
    		$table->string('cep', 10)->nullable();
    		$table->string('logradouro', 255)->nullable();
    		$table->string('numero', 20)->nullable();
    		$table->string('complemento', 100)->nullable();
    		$table->string('bairro', 100)->nullable();
    		$table->string('cidade', 100)->nullable();
    		$table->string('estado', 100)->nullable();
    		$table->string('latitude', 255)->nullable();
    		$table->string('logitude', 255)->nullable();
    	
    		$table->integer('fk_celula')->unsigned()->nullable();
    		$table->foreign('fk_celula')->references('id')->on('celulas');
    	
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
    	Schema::table('membros', function (Blueprint $table) {
    		$table->dropForeign('membros_fk_celula_foreign');
    		$table->dropColumn('fk_celula');
    	});
    }
}
