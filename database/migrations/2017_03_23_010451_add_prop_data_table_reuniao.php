<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPropDataTableReuniao extends Migration
{
    public function up()
    {
         Schema::table('reunioes', function (Blueprint $table) {
            $table->date('data');
        });
    }
 
    public function down()
    {
          Schema::table('reunioes', function (Blueprint $table) {
            $table->dropColumn('data');
        });
    }
}
