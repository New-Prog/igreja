<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Request;
use Hash;
use Exception;

class Membro extends Model
{
	protected $table = 'membros';
 
    protected $fillable = ['nome', 'sexo', 'cpf', 'data_nasc',  'email', 'tipo', 'telefone', 'celular'];
    
    public function endereco() 
    {
        return $this->belongsTo('App\Endereco','fk_endereco' );   
    }
    public function celula() 
    {
        return $this->belongsTo('App\Celula','fk_celula' );   
    }
    
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
