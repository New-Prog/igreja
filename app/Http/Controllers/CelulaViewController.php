<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;

use App\Celula;
use App\Membro;
use Response;


//use App\Http\Requests;
// use App\Http\Requests;
//use App\User;
// use Request;

class CelulaViewController extends Controller
{
    protected $celula;
    protected $membros;
    

    public function __construct(Celula $celula)
    {
        $this->celula   = $celula;
    }
    
    public function getCelulasByFilter(Request $request) {
    	$type = $request->get('type');
    	
    	$content = $request->get('content');
    	
    	$celulas = null;
    	$celula = new Celula();
    	
    	if($type == 'lider') {
    		$celulas = $celula->getCelulaByLider($content);
    	} else if($type == 'nome'){
    		$celulas = $celula->getCelulaByName($content);
    	} else {
    		$celulas = $this->celula->with('lider')->get();
    	}

    	return $celulas;
    }
    
    public function getLideres()
    {
    	$response = [];
    	$membros = Membro::allLiders();
    	foreach ($membros as $membros) {
    		array_push($response, ['id'=>$membros->id, 'nome'=>$membros->nome]);
    	}
    	return $response;
    }
    
    public function allCelulas()
    {
        $celulas = $this->celula->with('lider')->get();
        
        if (!$celulas)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
        
        return view('celulas_consultar')->with(['celulas'=> json_encode($celulas)])->renderSections()['conteudo'];

    }

    public function viewCelula()
    {
        return view('celulas_cadastrar')->with('lideres', Membro::allLiders())->renderSections()['conteudo'];

    }

    public function getCelula($id)
    {
        $celula = Celula::find($id);
        
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }

        return view('celulas_consultar')->with('celulas', $celula)->renderSections()['conteudo'];
    }

    public function saveCelula(Request $request)
    {   
        $input = $request->all();
        
        $input['lider'] = !$input['lider'] ? null : $input['lider'];
        
        $celula = $this->celula->saveCelula($input);
        
        $celulas = $this->celula->with('membro')->get();
        
        if (!$celula) {
            Response::json(['response' => 'Celula não encontrado'], 400);   
        }

        return view('celulas_consultar')->with('celulas', $celulas);
    }
        
    public function updateCelula($id, Request $request)
    {
        $input = $request->all();
        $input['lider'] = !$input['lider'] ? null : $input['lider'];
        
        $celula = $this->celula->updateCelula($id, $input);
        
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
        
        return view('celulas_consultar')->with('celulas', Celula::all());
        
    }
    public function alterarCelula($id, Request $request)
    {	
        $celula = Celula::find($id);
        
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }

        return view('celulas_cadastrar')->with(['celula'=>$celula, 'lideres'=> Membro::allLiders()] )->renderSections()['conteudo'];
    }
            /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCelula($id)
    {
    	Membro::where('fk_celula', $id)->update(['fk_celula'=> null]);
    	
        $this->celula->deleteCelula($id);
        //return view('celulas_consultar')->with('celulas', Celula::all());
        return redirect()->route('allCelulas');

    }
}
