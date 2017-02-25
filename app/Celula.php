<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celula extends Model
{
	protected $table = 'celulas';
    protected $fillable = ['descricao', 'cep', 'logradouro', 'numero' , 'complemento' , 'bairro' , 'cidade' , 'estado','latitude', 'logitude'];
        
    public function membro() 
    {
        return $this->hasMany('App\Membro', 'fk_celula');   
    } 
     
     
    public function allCelulas()
    {
        return self::all(); 
    }
     


    public function saveCelula($arr)
    {

        $input = $arr;
           
        $celula = new Celula();
        $celula->fill($input); // Mass assignment
        $celula->save();

        return $celula;
    }

    public function getCelula($id)
    {
        $celula = self::find($id);
        
        if (is_null($celula))
        {
            return false;
        }
            
        return $celula;
        
    }
    public function updateCelula($id, $request)
    {
        $celula = self::find($id);
        
        if (is_null($celula)) 
        {
            return false;
        }
        $input = $request;

        $celula->fill($input); // Mass assignment
        
        $celula->save();

        return $celula;
    }
    
}
 
