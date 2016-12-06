<?php

namespace PriceSpy;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
	protected $table = 'membros';
 
    protected $fillable = ['membro_cpf', 'membro_nome', 'membro_sobrenome', 'membro_rg', 'membro_data_nascimento', 'membro_endereco',	'membro_cep', 'membro_id_celula', 'membro_telefone_1', 'membro_telefone_2', 'membro_tipo'];
}
