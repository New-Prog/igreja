<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Celula extends Model
{
	protected $table = 'celulas';
    protected $fillable = ['nome', 'descricao', 'lider'];

    public function membro()
    {
        return $this->hasMany('App\Membro', 'fk_celula');
    }
    
    public function lider() 
    {
    	return $this->belongsTo('App\Membro', 'lider');
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
        return $this->find($id);
    }
    
    
    public function getCelulaByLider($id_lider)
    {
    	return $this->where('lider', $id_lider)->with('lider')->get();
    }
    
    
    public function getCelulaByName($name) 
    {
    	return $this->where('nome', 'like', "%{$name}%")->get();
    }
    
    
    public function updateCelula($id, $request)
    {
        $celula = $this->find($id);

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
        $celula = $this->find($id);
        
        $membros = Membro::where('fk_celula',$id);
        
        if($membros) {
        	$membros->update(['fk_celula' => null]);
        }
        
        $celula->delete();
        
        return true;
    }

}
