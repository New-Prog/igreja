<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Request;
/*
use Hash;
use Exe o role ontem nem me ception;

use Illuminate\Support\Facades\DB;
*/
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

    public function getMembroByCPF($cpf)
    {

        $membro = self::where('cpf' ,$cpf)->with('celula')->get();
        
        if (is_null($membro))
        {
            return false;
        }
            
        return $membro;
        
    }
    
    public function getMembroByNome($nome)
    {

        $membro = self::where('nome' ,$nome)->with('celula')->get();
        
        if (is_null($membro))
        {
            return false;
        }
            
        return $membro;
        
    }
    public static function getMembroByCelulaAPI($id)
    {
    	
    	$membro = self::where('fk_celula',$id)->get();

    	if (is_null($membro))
    	{
    		return false;
    	}
    	
    	return $membro;
    	
    }
    
    public static function getMembroByCelula($id)
    {

        $membro = self::where('fk_celula',$id)->with('celula')->get();
        // dd($membro);
        if (is_null($membro))
        {
            return false;
        }
            
        return $membro;
        
    }


    public static function getMembroByCpfEmail($arr)
    {

        $cpf = $arr['cpf'];
        $email = $arr['email'];

        if (empty($cpf)) {
            return false;
        } 

        if (empty($email)) {
            return false;
        } 

        $membro = self::where('cpf',$cpf)->where('email',$email)->first();

        if (is_null($membro))
        {
            return false;
        }

        if ($membro->tipo != 'lider') {
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

    public function deleteMembro($id)
    {
        $membro = self::find($id);
        $membro->delete();
        return;
    }
}
