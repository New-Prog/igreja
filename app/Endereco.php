<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
        
    protected $table = 'enderecos';
    protected $fillable = ['logradouro','tipo', 'numero', 'cep', 'bairro', 'cidade', 'latitude' , 'logitude'];
   

    public function allEndereco()
    {
        return self::all();
    
    }
    public function saveEndereco($arr)
    {
        $input = $arr;
        
        $endereco = new Endereco();
        $endereco->fill($input); 
        $endereco->save();

        return $endereco;
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
    public function updateMembro($id)
    {
        $membro = self::find($id);
        
        if (is_null($membro)) 
        {
            return false;
        }
       
        $input = Request::all();
        
        // if (isset($input['password'])) {
        //     $input['password'] = Hash::make($input['password']);
        // }
        
        $membro->fill($input); // Mass assignment
        $membro->save();
        return $membro;
        
    }
    public function deleteMembro($id)
    {
        $membro = self::find($id);
        if (is_null($membro))
        {
            return false;
        }
        return $membro->delete();
        
    }
    



}
