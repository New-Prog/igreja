<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    protected $table = 'reunioes';

    protected $fillable = ['data', 'tema'];
    
    public function celula() 
    {
        return $this->belongsTo('App\Celula','fk_celula' );   
    }

    public function allReunioes()
    {
        return self::all(); 
    }
     
    public function saveReuniao($arr)
    {

        $input = $arr;
           
        $reuniao = new Reuniao();
        $reuniao->fill($input); // Mass assignment
        $reuniao->save();

        return $reuniao;
    }
    
    public function getReuniao($id)
    {
        $reuniao = self::find($id);
        
        if (is_null($reuniao))
        {
            return false;
        }
        
        return $reuniao;
        
    }
    
    public function updateReuniao($id)
    {
        $reuniao = self::find($id);
        
        if (is_null($reuniao)) 
        {
            return false;
        }
       
        $input = Request::all();
        
        $reuniao->fill($input); // Mass assignment
        $reuniao->save();

        return $reuniao;
    }
}
