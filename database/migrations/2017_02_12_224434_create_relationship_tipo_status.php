<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipTipoStatus extends Migration
{
    public function up()
    {
        Schema::table('tipo_status', function (Blueprint $table) {
            $table->integer('criado_por')->unsigned();
            $table->foreign('criado_por')->references('id')->on('membro')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::table('tipo_status', function (Blueprint $table) {
            $table->dropForeign('tipo_status_criado_por_foreign');
            $table->dropColumn('criado_por');
        });
    }
}
