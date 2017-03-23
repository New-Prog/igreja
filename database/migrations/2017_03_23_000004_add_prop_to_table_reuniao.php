<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPropToTableReuniao extends Migration
{
 
    public function up()
    {
         Schema::create('reunioes', function (Blueprint $table) {
            $table->date('data');
            $table->string('descricao', 500);
        });
    }
 
    public function down()
    {
          Schema::table('reunioes', function (Blueprint $table) {
            $table->dropColumn('data');
             $table->dropColumn('descricao');
        });
    }
}
