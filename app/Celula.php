<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Psr7\Request;

class Celula extends Model
{
	protected $table = 'celulas';
    protected $fillable = ['nome', 'descricao', 'lider'];

    public function membro()
    {
        return $this->hasMany('App\Membro', 'fk_celula');
    }

    public function allCelulas()
    {
        return self::all();
    }

    public function saveCelula($input)
    {
		$celula = new Celula();
     
        $celula->fill($input); // Mass assignment
        
        $celula->save();
        
        if($input['lider']) {
        	$lider = Membro::find($input['lider']);
        	
        	$lider->fill(['fk_celula' => $celula->id]);
        	
        	$lider->save();
        }
        
        
        return $celula;
    }

    public function getCelula($id)
    {
        $celula = self::find($id);

        if (is_null($celula))
        {
            return false;
        }

        return $celula;

    }
    public function updateCelula($id, $request)
    {
        $celula = self::find($id);

        if (is_null($celula))
        {
            return false;
        }
        $input = $request;

        $celula->fill($input); // Mass assignment
		
        $celula->save();
        
        if($input['lider']) {
        	$lider = Membro::find($input['lider']);
        	
        	$lider->fill(['fk_celula' => $celula->id]);
        	
        	$lider->save();
        }


        return $celula;
    }
        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCelula($id)
    {
        $celula = self::find($id);
        
        $membros = Membro::where('fk_celula',$id);
        
        if($membros) {
        	$membros->update(['fk_celula' => null]);
        }
        
        $celula->delete();
        
        return true;
    }

}
