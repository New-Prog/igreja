<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCelulasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('celulas', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('nome');
    		
    		$table->integer('lider')->unsigned()->nullable();
    		
    		//$table->foreign('lider')->references('id')->on('membros');
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
    	Schema::dropIfExists('celulas');
    }
}
