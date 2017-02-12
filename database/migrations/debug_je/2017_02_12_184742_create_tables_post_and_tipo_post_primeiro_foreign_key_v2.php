<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesPostAndTipoPostPrimeiroForeignKeyV2 extends Migration
{
    public function up()
    {
        Schema::create('tipo_post', function (Blueprint $table) {
            $table->increments('id');  
            $table->integer('descricao');
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
        Schema::drop('post');
        Schema::drop('tipo_post');
    }
}
