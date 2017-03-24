<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('enderecos', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('cep', 8);
        //     $table->string('logradouro', 255);
        //     $table->string('numero', 20);
        //     $table->string('complemento', 20);
        //     $table->string('bairro', 100);
        //     $table->string('cidade', 100);
        //     $table->string('estado', 100);
        //     $table->string('latitude', 255)->nullable();
        //     $table->string('logitude', 255)->nullable();
        //     $table->timestamps();
        // });
        
        // Schema::create('hierarquias', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('descricao', 255);
        //     $table->timestamps();
        // });
        
        // Schema::create('tipos_posts', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('descricao', 255);
        //     $table->timestamps();
        // });
        
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('data', 255);
            $table->string('nome', 255);
            $table->string('descricao', 255);
            $table->string('tipo', 255);
            $table->string('link_imagem', 255);
            $table->string('link', 255);
            $table->timestamps();

        });
        
        Schema::create('celulas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao');
            $table->integer('lider');
            $table->timestamps();
        });
        
        Schema::create('reunioes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 255);
            $table->string('tema')->nullable();
            $table->date('data')->nullable();
            $table->string('cep', 30);
            $table->string('logradouro', 255);
            $table->string('numero', 30);
            $table->string('complemento', 20)->nullable();
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->string('estado', 100);
            $table->string('latitude', 255)->nullable();
            $table->string('logitude', 255)->nullable();
            $table->integer('fk_celula')->unsigned();
            $table->foreign('fk_celula')->references('id')->on('celulas')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('membros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255)->nullable();
            $table->char('sexo', 1)->nullable();
            $table->char('cpf', 20)->nullable();

            $table->string('estado_civil', 12)->nullable();
            $table->string('dt_nasc', 12)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('tipo')->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('celular', 20)->nullable();

            $table->string('cep', 8)->nullable();
            $table->string('logradouro', 255)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('complemento', 20)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('estado', 100)->nullable();
            $table->string('latitude', 255)->nullable();
            $table->string('logitude', 255)->nullable();
            
            $table->integer('fk_celula')->unsigned()->nullable();
            $table->foreign('fk_celula')->references('id')->on('celulas')->onDelete('cascade');            
            
            $table->timestamps();        
            
        });
        
        
        Schema::create('presencas', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('fk_reuniao')->unsigned();
            $table->foreign('fk_reuniao')->references('id')->on('reunioes')->onDelete('cascade');    
            
            $table->integer('fk_celula')->unsigned();
            $table->foreign('fk_celula')->references('id')->on('celulas')->onDelete('cascade');         
            
            $table->boolean('presente');
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
        // Schema::table('posts', function (Blueprint $table) {
        //   $table->dropForeign('posts_fk_tipo_post_foreign');
        //   $table->dropColumn('fk_tipo_post');

        // });
        // Schema::table('celulas', function (Blueprint $table) {
        //     $table->dropForeign('celulas_fk_endereco_foreign');
        //     $table->dropColumn('fk_endereco');
        // });
        Schema::table('reunioes', function (Blueprint $table) {
            $table->dropForeign('reunioes_fk_celula_foreign');
            $table->dropColumn('fk_celula');
        });
        Schema::table('membros', function (Blueprint $table) {
            // $table->dropForeign('membros_fk_endereco_foreign');
            $table->dropForeign('membros_fk_celula_foreign');
            // $table->dropForeign('membros_fk_hierarquia_foreign');
            // $table->dropColumn('fk_endereco');
            $table->dropColumn('fk_celula');
            // $table->dropColumn('fk_hierarquia');
        });
        Schema::table('presencas', function (Blueprint $table) {
            $table->dropForeign('presencas_fk_membro_foreign');
            $table->dropForeign('presencas_fk_reuniao_foreign');
            $table->dropColumn('fk_membro');
            $table->dropColumn('fk_reuniao');
        });

        // Schema::dropIfExists('enderecos');
        // Schema::dropIfExists('hierarquias');
        // Schema::dropIfExists('tipos_posts');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('celulas');
        Schema::dropIfExists('reunioes');
        Schema::dropIfExists('membros');
        Schema::dropIfExists('presencas');
    }
}
