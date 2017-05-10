<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    protected $table = 'presencas';

    protected $fillable = ['presente','fk_reuniao', 'fk_membro'];

    public function reuniao() 
    {
    	return $this->belongsTo('App\Reuniao','fk_reuniao');
    }    
    
    public function membro() 
    {
    	
    	return $this->belongsTo('App\Membro','fk_membro');
    }

    public function allPresencas()
    {
        return self::all(); 
    }
     
    public function savePresenca($arr)
    {
        
       $this->fill($arr)->save();

        return $this;   
    }
    
    public function getPresencaByReuniao($id_membro)
    {	

    	$presenca = $this->where("fk_reuniao", $id_membro)->get();
        
        if (is_null($presenca))
        {
            return false;
        }
        return $presenca;
        
    }
    
    public function getPresencaByMembro($id_membro)
    {
    	$presenca = $this->where("fk_membro", $id_membro)->with(['reuniao', 'membro'])->get();
    	
    	if (is_null($presenca))
    	{
    		return false;
    	}
    	
    	return $presenca;
    	
    }
    
    public function updatePresenca($arr_up_presenca)
    {	
    	
    	$presenca = self::where('fk_reuniao', $arr_up_presenca['fk_reuniao'])
    						->where('fk_membro', $arr_up_presenca['fk_membro'])
    						->update(['presente' => $arr_up_presenca['presente']]);
    	if (!$presenca) 
        {
            return false;
        }
          
        return $presenca;
        
    }


}
