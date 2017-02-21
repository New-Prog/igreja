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
     
    public function saveReuniao($request)
    {

        // dd(http_request(method, url))
    	
        // $input = Request::all();
        // $input['password'] = Hash::make($input['password']);
        // $user = new User();
        //$user->fill($input); // Mass assignment
        //$user->save();
        // return $user;
        
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
        
        // if (isset($input['password'])) {
        //     $input['password'] = Hash::make($input['password']);
        // }
        
        $reuniao->fill($input); // Mass assignment
        $reuniao->save();
        return $reuniao;
        
    }


}
