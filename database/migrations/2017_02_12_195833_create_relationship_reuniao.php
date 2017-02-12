<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipReuniao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reuniao', function (Blueprint $table) {
            $table->integer('id_celula')->unsigned();
            $table->foreign('id_celula')->references('id')->on('celula')->onDelete('cascade');;
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reuniao', function (Blueprint $table) {
            $table->dropForeign('reuniao_id_celula_foreign');
            $table->dropColumn('id_celula');

        });
    }
}
