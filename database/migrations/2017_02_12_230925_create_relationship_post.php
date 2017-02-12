<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post', function (Blueprint $table) {
            
            $table->integer('cod_tipo_post')->unsigned();
            $table->foreign('cod_tipo_post')->references('id')->on('tipo_post')->onDelete('cascade');
            
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
        Schema::table('post', function (Blueprint $table) {
            
            $table->dropForeign('post_criado_por_foreign');
            $table->dropForeign('post_cod_tipo_post_foreign');
            
            $table->dropColumn('criado_por');
            $table->dropColumn('cod_tipo_post');
            
        });
    }
}
