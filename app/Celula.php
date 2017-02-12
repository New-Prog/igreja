<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celula extends Model
{
	protected $table = 'celula';
    protected $fillable = ['nome', 'id_endereco', 'criado_por', 'id_lider'];
    
    
}
 
