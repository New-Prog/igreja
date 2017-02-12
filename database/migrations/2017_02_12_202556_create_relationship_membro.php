<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipMembro extends Migration
{
    public function up()
    {
        Schema::table('membro', function (Blueprint $table) {
            
            $table->integer('id_celula')->unsigned();
            $table->integer('id_endereco')->unsigned();
            $table->integer('id_status')->unsigned();
            $table->integer('criado_por')->unsigned();
            
            $table->foreign('id_celula')->references('id')->on('celula')->onDelete('cascade');
            $table->foreign('id_endereco')->references('id')->on('endereco')->onDelete('cascade');
            $table->foreign('id_status')->references('id')->on('status_membro')->onDelete('cascade');
            $table->foreign('criado_por')->references('id')->on('membro')->onDelete('cascade');
            
        }); 
    }

    public function down()
    {
        Schema::table('membro', function (Blueprint $table) {
            $table->dropForeign('membro_id_celula_foreign');
            $table->dropForeign('membro_id_status_foreign');
            $table->dropForeign('membro_id_endereco_foreign');
            $table->dropForeign('membro_criado_por_foreign');
        
            $table->dropColumn('id_celula');
            $table->dropColumn('id_endereco');
            $table->dropColumn('id_status');
            $table->dropColumn('criado_por');
            
        });
    }
    
}
