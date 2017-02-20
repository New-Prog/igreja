<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
        
    protected $table = 'enderecos';
    protected $fillable = ['logradouro','tipo', 'numero', 'cep', 'bairro', 'cidade', 'latitude' , 'logitude'];

}
