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
            
            $table->integer('id_endereco')->unsigned();
            $table->foreign('id_endereco')->references('id')->on('endereco')->onDelete('cascade');
            
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
        Schema::table('celula', function (Blueprint $table) {
            $table->dropForeign('celula_id_endereco_foreign');
            $table->dropForeign('celula_id_lider_foreign');
            $table->dropForeign('celula_criado_por_foreign');
            
            $table->dropColumn('id_endereco');
            $table->dropColumn('id_lider');
            $table->dropColumn('criado_por');
        });
    }
}