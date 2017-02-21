<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celula extends Model
{
	protected $table = 'celulas';
    protected $fillable = ['descricao'];
    
    public function endereco() 
    {
        return $this->belongsTo('App\Endereco','fk_endereco' );   
    }
     
     
     
    public function allCelulas()
    {
        return self::all(); 
    }
     
    public function saveCelula($request)
    {

        // dd(http_request(method, url))

        // $input = Request::all();
        // $input['password'] = Hash::make($input['password']);
        // $user = new User();
        //$user->fill($input); // Mass assignment
        //$user->save();
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
 
