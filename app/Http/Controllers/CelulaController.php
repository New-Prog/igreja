<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Celula;
use Response;

class CelulaController extends Controller
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
     
        return Response::json($celula , 200);
    }

    public function getCelula($id)
    {
        $celula = $this->celula->getCelula($id)->load('membro');
   

        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }

        return Response::json( $celula, 200);
    }
    
    public function getSoCelula($id)
    {
        $celula = $this->celula->getCelula($id);
        
        
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
        
        return Response::json( $celula, 200);
    }
    
    public function saveCelula(Request $request)
    {   
        $input = $request->all();
		
        $celula = $this->celula->saveCelula($input);
        if (!$celula) {
            Response::json(['response' => 'Celula não encontrado'], 400);   
        }

        return Response::json($celula->load('membro'), 200);        
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

    public function deleteMembro($id)
    {
        $this->celula->deleteMembro($id);
        return Response::json('OK', 200);

    }
}
