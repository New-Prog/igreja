<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    protected $table = 'presencas';

    protected $fillable = ['presente'];
    
    public function reuniao() 
    {
        return $this->HasMany('App\Reuniao','fk_reuniao' );   
    }    
    public function membro() 
    {
        return $this->HasMany('App\Membro','fk_membro' );   
    }

        public function allPresencas()
    {
        return self::all(); 
    }
     
    public function savePresenca($arr)
    {

        $input = $arr;
        
        $presenca = new Presenca();
        
        $presenca->fill($input);

        $presenca->save();

        return $presenca;
        
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
    
    public function updatePresenca($id, $arr_up_presenca)
    {
        $presenca = self::find($id);
        
        if (is_null($presenca)) 
        {
            return false;
        }
          
        $input = $arr_up_presenca;
        
        $presenca->fill($input); // Mass assignment
        $presenca->save();
        
        return $presenca;
        
    }


}
