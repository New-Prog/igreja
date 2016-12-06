<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros', function($table){
            $table->increments('membro_id');
            $table->string('membro_nome', 255);
            $table->string('membro_snome', 255);
            $table->string('membro_cpf', 11);
            $table->string('membro_rg', 20);
            $table->string('membro_nmae', 255);
            $table->string('membro_nconjuge', 255);
            $table->string('membro_telefresid', 15);
            $table->string('membro_telefcel', 15);
            $table->string('membro_telefcom', 15);
            $table->string('membro_naturalidade', 255);
            $table->string('membro_nacionalidade', 255);
            $table->string('membro_escolaridade', 255);
            $table->string('membro_como_conheceu', 255);
            $table->longText('membro_detalhes', 255);

            $table->string('resid_logradouro', 255);
            $table->string('compl_end_resid', 255);
            $table->string('resid_numero', 255);
            $table->string('resid_bairro', 255);
            $table->string('resid_cidade', 255);
            $table->string('resid_pais', 255);

            $table->boolean('membro_ativo');

            $table->boolean('membro_dizimista');
            $table->float('membro_renda_mensal');

            $table->string('membro_email', 255);
            $table->string('membro_site' , 255);
            $table->string('membro_facebook' , 255);
            $table->string('membro_twitter' , 255);
            $table->string('membro_youtube' , 255);
            $table->string('membro_linkedin' , 255);

            $table->boolean('membro_prof_fe');
            $table->date('membro_dt_prof_fe');
            $table->string('membro_local_prof_fe' , 255);

            $table->boolean('membro_batizado');
            $table->date('membro_dt_batismo');
            $table->string('membro_local_batismo' , 255);

            $table->string('membro_ministerio');
            $table->string('membro_aceitacao_minist');
            $table->date('membro_dt_aceitacao_minist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('membros', 'membros_old');
    }
}
