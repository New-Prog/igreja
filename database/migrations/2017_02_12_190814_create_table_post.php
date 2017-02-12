<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nome');
            $table->integer('descricao');
            $table->integer('criado_por');
            $table->timestamps();
        });
        
        Schema::table('post', function (Blueprint $table) {
            $table->integer('cod_tipo_post')->unsigned();
            $table->foreign('cod_tipo_post')->references('id')->on('tipo_post')->onDelete('cascade');;
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
    }
}
