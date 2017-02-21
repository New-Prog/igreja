<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Celula;
use App\User;
use Request;
use Response;


class CelulaController extends Controller
{
    protected $celula;

    public function __construct(Celula $celula)
    {
        $this->celula = $celula;
    }

    public function update(Request $request)
    {


        // $request->input('id')
        // $request->input('id')
        // $request->input('id')
        // $request->input('id')
        // $celula = Celula::find();

        $celula->fill($request->all());
        $celula->save();


        return response()->json(['OK' => 'Sucesso '], 200);
    }

    public function allCelulas()
    {
        
        $celula = $this->celula->with('endereco')->get();
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
     
        return Response::json($celula , 200);
    }

    public function getCelula($id)
    {
        $celula = $this->celula->getCelula($id);
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
        return Response::json( $celula, 200);
    }
    public function saveCelula($request)
    {
        return Response::json($this->celula->saveCelula(), 200);        
    }
    public function updateCelula($id)
    {
        $celula = $this->celula->updateCelula($id);
        
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
     
        return Response::json($celula, 200);
        
    }
    
    // public function deleteCelula($id)
    // {
    //     $celula = $this->celula->deleteUser($id);
    //     if (!$celula)
    //     {
    //         return Response::json(['response' => 'Célula não encontrada'], 400);
    //     }
    //     return Response::json(['response' => 'Célula removida'], 200);        
    // }
}
