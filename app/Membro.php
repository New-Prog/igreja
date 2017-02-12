<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Request;
use Hash;
use Exception;

class Membro extends Model
{
	protected $table = 'membro';
 
    protected $fillable = ['nome', 'sexo', 'cpf', 'email', 'tipo', 'telefone', 'celular', 'id_celula', 'id_endereco', 'id_status'];
    
    public function celula() 
    {
        return $this->belongsTo(App\Celula);   
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
