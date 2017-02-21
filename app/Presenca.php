<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    protected $table = 'presencas';

    protected $fillable = ['presente'];
    
    public function reuniao() 
    {
        return $this->hasOne('App\Reuniao','fk_reuniao' );   
    }    
    public function membro() 
    {
        return $this->hasOne('App\Membro','fk_membro' );   
    }

        public function allPresencas()
    {
        return self::all(); 
    }
     
    public function savePresenca()
    {


        
        // $input = Request::all();
        // $input['password'] = Hash::make($input['password']);
        // $user = new User();
        //$user->fill($input); // Mass assignment
        //$user->save();
        // return $user;
        
    }
    
    public function getPresenca($id)
    {
        $presenca = self::find($id);
        
        if (is_null($presenca))
        {
            return false;
        }
        
        return $presenca;
        
    }
    
    public function updatePresenca($id)
    {
        $presenca = self::find($id);
        
        if (is_null($presenca)) 
        {
            return false;
        }
       
        $input = Request::all();
        
        // if (isset($input['password'])) {
        //     $input['password'] = Hash::make($input['password']);
        // }
        
        $presenca->fill($input); // Mass assignment
        $presenca->save();
        return $presenca;
        
    }


}
