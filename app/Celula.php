<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celula extends Model
{
	protected $table = 'celula';
    protected $fillable = ['id_lider', 'id_endereco', 'criado_por', 'criado_em', 'atualizado_em'];
    
     /*public function celula() 
    {
        return $this->belongsTo("App\Celula");   
    }
     */
     
     public function allCelulas()
    {
        return self::all();
    
    }
     
     public function saveCelula()
    {
        $input = Request::all();
        // $input['password'] = Hash::make($input['password']);
        $user = new User();
        $user->fill($input); // Mass assignment
        $user->save();
        return $user;
        
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
    
    public function updateCelula($id)
    {
        $celula = self::find($id);
        
        if (is_null($celula)) 
        {
            return false;
        }
       
        $input = Request::all();
        
        // if (isset($input['password'])) {
        //     $input['password'] = Hash::make($input['password']);
        // }
        
        $celula->fill($input); // Mass assignment
        $celula->save();
        return $celula;
        
    }
    
    public function deleteCelula($id)
    {
        $celula = self::find($id);
        if (is_null($celula))
        {
            return false;
        }
        return $celula->delete();
        
    }
    
    
}
 
