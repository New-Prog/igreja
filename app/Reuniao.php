<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    protected $table = 'reunioes';

    protected $fillable =
    [
    	'descricao', 'tema', 'cep','logradouro','numero','complemento',
     	'bairro','cidade','estado','latitude','longitude', 'fk_celula', 'data'
    ];

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


    public static function getReuniaoByCelula($id)
    {

    	$reuniao = self::where('fk_celula', $id)->with('celula')->get();

    	if (is_null($reuniao))
    	{
    		return false;
    	}

    	return $reuniao;

    }
    public function updateReuniao($id , $request)
    {
        $reuniao = $this->find($id);

        if (is_null($reuniao))
        {
            return false;
        }

        $input = $request;
        $reuniao->fill($input); // Mass assignment
        $reuniao->save();

        return $reuniao;
    }
    public function deleteReuniao($id)
    {
    	$reuniao = self::find($id);

    	$reuniao->delete();

    	return;
    }
}
