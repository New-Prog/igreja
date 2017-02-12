<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePostAndTipoPostForDebug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_post', function (Blueprint $table) {
            $table->increments('id');  
            $table->integer('descricao');
            $table->timestamps(); 
        });
        
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nome');
            $table->integer('data');
            $table->integer('cod_tipo_post');
            $table->integer('tipo');
            $table->integer('descricao');
            $table->integer('criado_por');
            $table->timestamps();
        });
        
        Schema::table('post', function (Blueprint $table) {
            // $table->integer('id_tipo_post')->unsigned();
            $table->foreign('id')->references('id')->on('tipo_post');
        });
     
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post');
        Schema::drop('tipo_post');
    }
}
