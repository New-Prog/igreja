<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipPresenca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presenca', function (Blueprint $table) {
            
            $table->integer('id_membro')->unsigned();
            $table->integer('id_reuniao')->unsigned();
            
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
            $table->dropForeign('presenca_id_membro_foreign');
            $table->dropForeign('presenca_id_reuniao_foreign');
            
            $table->dropColumn('id_membro');
            $table->dropColumn('id_reuniao');
        });
    }
}
