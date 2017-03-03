<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Http\Requests;

use App\Celula;

// use App\Http\Requests;
use App\User;
// use Request;
use Response;

class CelulaViewController extends Controller
{
    protected $celula;

    public function __construct(Celula $celula)
    {
        $this->celula = $celula;
    }

    public function allCelulas()
    {
        
        $celula = $this->celula->with('membro')->get();
        
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
     
        return view('celulas_consultar')->with('celulas', $celula);
    }

    public function viewCelula()
    {
  
        return view('celulas_cadastrar');
    }

    public function getCelula($id)
    {
        $celula = $this->celula->getCelula($id);
   
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }

        return view('celulas_consultar')->with('celulas', $celula);
    }

    public function saveCelula(Request $request)
    {   
        $input = $request->all();

        $celula = $this->celula->saveCelula($input);
        $celulaa = $this->celula->with('membro')->get();
        if (!$celula) {
            Response::json(['response' => 'Celula não encontrado'], 400);   
        }

        return view('celulas_consultar')->with('celulas', $celulas);
    }
        
    public function updateCelula($id, Request $request)
    {
        $input = $request->all();

        $celula = $this->celula->updateCelula($id, $input);
        
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
     
        return Response::json($celula, 200);
    }
}
