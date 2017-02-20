<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    protected $table = 'reunioes';

    protected $fillable = ['data', 'tema'];
    
    public function celula() 
    {
        return $this->hasOne('App\Celula','fk_celula' );   
    }
}
