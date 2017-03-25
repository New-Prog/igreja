<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

use App\Celula;

use App\Membro;
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
        
        $celula = $this->celula->allCelulas();
        
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
        return view('celulas_consultar')->with('celulas', $celula)->renderSections()['conteudo'];
    }

    public function viewCelula()
    {  
        return view('celulas_cadastrar')->renderSections()['conteudo'];

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

        $celula = $this->celula->updateCelula($id, $input);
        
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
     
        return Response::json($celula, 200);
    }
    public function alterarCelula($id, Request $request)
    {
        $celula = Celula::find($id);
        
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }

        return view('celulas_cadastrar')->with('celulas', $celula)->renderSections()['conteudo'];
    }
            /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCelula($id)
    {
        $this->celula->deleteMembro($id);
        return Redirect::route('allCelulas');

    }
}
