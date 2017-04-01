<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    protected $table = 'presencas';

    protected $fillable = ['presente','fk_reuniao', 'fk_membro'];
    
    public function reuniao() 
    {
    	
        //return $this->HasMany('App\Reuniao','fk_reuniao' );
        
    	return $this->belongsTo('App\Reuniao','fk_reuniao');
    }    
    public function membro() 
    {
    	
    	return $this->belongsTo('App\Membro','fk_membro');
        //return $this->HasMany('App\Membro','fk_membro' );   
    }

        public function allPresencas()
    {
        return self::all(); 
    }
     
    public static function savePresenca($arr)
    {

        $input = $arr;
        
        $presenca = new Presenca();
        
        $presenca->fill($input);

        $presenca->save();

        return $presenca;
        
    }
    
    public function getPresencaByReuniao($id_membro)
    {
    	
    	
    	$presenca = self::where("fk_reuniao", $id_membro);
        
        if (is_null($presenca))
        {
            return false;
        }
        
        return $presenca;
        
    }
    
    public function getPresencaByMembro($id_membro)
    {
    	$presenca = self::where("fk_membro", $id_membro)->with(['reuniao', 'membro'])->get();
    	
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
