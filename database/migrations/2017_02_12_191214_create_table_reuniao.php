<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReuniao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reuniao', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_reuniao');
            $table->string('tema', 100);
            // $table->integer('id_celula');
            $table->string('status',100);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reuniao');
    }
}
