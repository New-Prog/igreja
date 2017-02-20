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

}
