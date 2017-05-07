<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
	protected $table = 'mensagens';
	
	protected $fillable = ['nome', 'telefone', 'descricao', 'email'];

	public function saveMensagem(array $arr)
	{
		$this->fill($arr)->save();
		
		return $this;
	}
}
