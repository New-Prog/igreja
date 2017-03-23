<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPropToTableReuniao2 extends Migration
{
     public function up()
    {
         Schema::table('reunioes', function (Blueprint $table) {
            $table->string('tema')->nullable();
            $table->string('cep', 20);
            $table->string('logradouro', 255);
            $table->string('numero', 20);
            $table->string('complemento', 20);
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->string('estado', 100);
            $table->string('latitude', 255)->nullable();
            $table->string('logitude', 255)->nullable();
        });
    }
 
    public function down()
    {
          Schema::table('reunioes', function (Blueprint $table) {
            $table->dorpColumn('tema');
            $table->dorpColumn('cep');
            $table->dorpColumn('logradouro');
            $table->dorpColumn('numero');
            $table->dorpColumn('complemento');
            $table->dorpColumn('bairro');
            $table->dorpColumn('cidade');
            $table->dorpColumn('estado');
            $table->dorpColumn('latitude');
            $table->dorpColumn('logitude');
        });
    }
}
