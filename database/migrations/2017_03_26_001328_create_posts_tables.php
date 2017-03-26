<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('posts', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('data', 255);
    		$table->string('nome', 255);
    		$table->string('descricao', 255);
    		$table->string('tipo', 255);
    		$table->string('link_imagem', 255);
    		$table->string('link', 255);
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
    	Schema::dropIfExists('posts');
    }
}
