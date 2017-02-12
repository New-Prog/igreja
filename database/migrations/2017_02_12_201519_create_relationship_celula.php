<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipCelula extends Migration
{
    public function up()
    {
        Schema::table('celula', function (Blueprint $table) {
            
            $table->integer('id_lider')->unsigned();
            $table->foreign('id_lider')->references('id')->on('membro')->onDelete('cascade');
            
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('celula', function (Blueprint $table) {
            $table->dropForeign('celula_id_lider_foreign');
            $table->dropColumn('id_lider');
        });
    }
}
