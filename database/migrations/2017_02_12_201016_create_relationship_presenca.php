<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipPresenca extends Migration
{

    public function up()
    {
        Schema::table('presenca', function (Blueprint $table) {
            
            $table->integer('criado_por')->unsigned();
            $table->integer('id_membro')->unsigned();
            $table->integer('id_reuniao')->unsigned();
            
            $table->foreign('criado_por')->references('id')->on('membro')->onDelete('cascade');
            $table->foreign('id_membro')->references('id')->on('membro')->onDelete('cascade');
            $table->foreign('id_reuniao')->references('id')->on('reuniao')->onDelete('cascade');
            
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presenca', function (Blueprint $table) {
            
            
            $table->dropForeign('presenca_criado_por_foreign');
            $table->dropForeign('presenca_id_membro_foreign');
            $table->dropForeign('presenca_id_reuniao_foreign');
            
            $table->dropColumn('criado_por');
            $table->dropColumn('id_membro');
            $table->dropColumn('id_reuniao');
        });
    }
}
