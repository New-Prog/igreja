<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipStatusMembro extends Migration
{

    public function up()
    {
        Schema::table('status_membro', function (Blueprint $table) {
            
            $table->integer('criado_por')->unsigned();
            $table->foreign('criado_por')->references('id')->on('membro')->onDelete('cascade');
            
            $table->integer('id_tipo_status')->unsigned();
            $table->foreign('id_tipo_status')->references('id')->on('tipo_status')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('status_membro', function (Blueprint $table) {
            $table->dropForeign('status_membro_criado_por_foreign');
            $table->dropForeign('status_membro_id_tipo_status_foreign');
            $table->dropColumn('id_tipo_status');
        });
    }
}
