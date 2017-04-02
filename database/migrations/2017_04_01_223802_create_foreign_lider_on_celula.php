<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignLiderOnCelula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('celulas', function (Blueprint $table) {
			$table->foreign('lider')->references('id')->on('membros');
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
    		$table->dropForeign('celulas_lider_foreign');
    	});
    }
}
