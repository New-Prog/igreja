<?php

namespace PriceSpy;

use Illuminate\Database\Eloquent\Model;

use Request;
use Hash;
use Exception;

class Membro extends Model
{
	protected $table = 'membros';
 
    protected $fillable = ['membro_cpf', 'membro_nome', 'membro_sobrenome', 'membro_rg', 'membro_data_nascimento', 'membro_endereco',	'membro_cep', 'membro_id_celula', 'membro_telefone_1', 'membro_telefone_2', 'membro_tipo', 'id_lider'];
    
    public function allMembros()
    {
        return self::all();
    
    }
    public function saveMembro()
    {
        $input = Request::all();
        // $input['password'] = Hash::make($input['password']);
        $user = new User();
        $user->fill($input); // Mass assignment
        $user->save();
        return $user;
    }
    public function getMembro($id)
    {
        $membro = self::find($id);
        
        if (is_null($membro))
        {
            return false;
        }
        
        return $membro;
        
    }
    public function updateMembro($id)
    {
        $membro = self::find($id);
        
        if (is_null($membro)) 
        {
            return false;
        }
       
        $input = Request::all();
        
        // if (isset($input['password'])) {
        //     $input['password'] = Hash::make($input['password']);
        // }
        
        $membro->fill($input); // Mass assignment
        $membro->save();
        return $membro;
        
    }
    public function deleteMembro($id)
    {
        $membro = self::find($id);
        if (is_null($membro))
        {
            return false;
        }
        return $membro->delete();
        
    }
    
    
}
