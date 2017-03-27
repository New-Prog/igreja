<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresencasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('presencas', function (Blueprint $table) {
    		$table->increments('id');
    	
    		$table->integer('fk_reuniao')->unsigned();
    		$table->foreign('fk_reuniao')->references('id')->on('reunioes')->onDelete('cascade');
    	
    		$table->integer('fk_celula')->unsigned();
    		$table->foreign('fk_celula')->references('id')->on('celulas')->onDelete('cascade');
    	
    		$table->boolean('presente');
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
    	Schema::table('presencas', function (Blueprint $table) {
    		$table->dropForeign('presencas_fk_membro_foreign');
    		$table->dropForeign('presencas_fk_reuniao_foreign');
    		$table->dropColumn('fk_membro');
    		$table->dropColumn('fk_reuniao');
    	});
    }
}
