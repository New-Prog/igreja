<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Request;
use Hash;
use Exception;

use Illuminate\Support\Facades\DB;

use App\Celula;

class Membro extends Model
{
    protected $table = 'membros';
 
    protected $fillable = ['nome', 'sexo' , 'cpf','estado_civil', 'dt_nasc' , 'email' , 'tipo' ,'telefone' ,'celular','cep','logradouro','numero','complemento','bairro','cidade','estado','latitude','logitude', 'fk_celula']; 

    public function celula() 
    {
        return $this->belongsTo('App\Celula','fk_celula' );   
    }
    
    public function allMembros()
    {
        return self::all();
    }

    public static function allLiders()
    {   
        
        $membro = self::where('tipo' ,'lider')->get();

        if (is_null($membro))
        {
            return false;
        }

        return $membro;
    }

    public function saveMembro($arr)
    {

        $input = $arr;
           
        $membro = new Membro();
        $membro->fill($input); // Mass assignment
        $membro->save();

        return $membro;
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

    public function getMembroByCelula($id)
    {

        $membro = self::where('fk_celula' ,$id)->get();
        
        if (is_null($membro))
        {
            return false;
        }
            
        return $membro;
        
    }

    public function updateMembro($id, $request)
    {
        $membro = self::find($id);
        
        if (is_null($membro)) 
        {
            return false;
        }
        $input = $request;
        $membro->fill($input); // Mass assignment
        
        $membro->save();

        return $membro;
    }    
}
