<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReunioesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('reunioes', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('descricao', 255);
    		$table->string('tema')->nullable();
    		$table->date('data')->nullable();
    		$table->string('cep', 30);
    		$table->string('logradouro', 255);
    		$table->string('numero', 30);
    		$table->string('complemento', 100)->nullable();
    		$table->string('bairro', 100);
    		$table->string('cidade', 100);
    		$table->string('estado', 100);
    		$table->string('latitude', 255)->nullable();
    		$table->string('longitude', 255)->nullable();
    		$table->integer('fk_celula')->unsigned();
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
    	Schema::table('reunioes', function (Blueprint $table) {
    		$table->dropForeign('reunioes_fk_celula_foreign');
    		$table->dropColumn('fk_celula');
    	});
    }
}
