<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovaMembrosConformeDiagramaCloves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('tipoPost', function (Blueprint $table) {
            $table->integer('id');  
            $table->integer('descricao');
            $table->timestamps();
            
            $table->primary('id');
        });
        
        Schema::create('tipoStatus', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('descricao');
            $table->integer('criado_por');
            $table->timestamps();
            
            $table->primary('id');
        });
        
        Schema::create('status_membro', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('id_tipo_status');
            $table->date('data_inclusao'); // i don't know
            $table->integer('criado_por');
            $table->timestamps();
            
            $table->primary('id');
        });
        
        Schema::create('celula', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('lider');
            $table->integer('endereco');
            $table->integer('criado_por');
            $table->timestamps();
            
            $table->primary('id');
        });
        
        Schema::create('endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo');
            $table->integer('logradouro');
            $table->integer('numero');
            $table->integer('cep');
            $table->integer('bairro');
            $table->integer('cidade');
            $table->integer('uf');
            $table->timestamps();
        });
    
        //Definindo tabelas para o sistema.
        Schema::create('membros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->char('sexo', 1);
            $table->integer('celula');
            $table->char('cpf', 11);
            $table->integer('cod_endereco');
            $table->string('email', 255);
            $table->integer('tipo');
            $table->integer('criado_por');
            $table->integer('cod_status');
            
            $table->foreign('criado_por')->references('id')->on('membros');
            $table->foreign('cod_endereco')->references('id')->on('endereco');
            $table->foreign('celula')->references('id')->on('celula');
            $table->foreign('cod_status')->references('id')->on('status_membro');
            
            $table->timestamps();
            
        });

        Schema::create('presenca', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('membro');
            $table->integer('reuniao');
            $table->integer('presente');
            $table->integer('criado_por');
            $table->timestamps();
        });


        Schema::create('post', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('nome');
            $table->integer('data');
            $table->integer('tipo');
            $table->integer('descricao');
            $table->integer('criado_por');
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
        //
    }
}
