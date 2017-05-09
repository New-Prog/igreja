<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Presenca;
use Response;

class PresencaController extends Controller
{


    protected $presenca;

    public function __construct(Presenca $presenca)
    {
        $this->presenca = $presenca;
   
    }

    public function allPresencas()
    {
        $presenca = $this->presenca->allPresencas();

        if (!$presenca)
        {
            return Response::json(['response' => ''], 400);
        }

        return Response::json($presenca->load(['reuniao', 'membro']), 200);
    }

    public function getPresenca($id)
    {
        $presenca = $this->presenca->getPresencaByReuniao($id);
        
        if (!$presenca)
        {
            return Response::json(['response' => ''], 400);
        }
     
        return Response::json($presenca->load('membro'), 200);
    }

    public function savePresenca(Request $request)
    {
        $input = $request->all();

        $presenca = $this->presenca->savePresenca($input);

        if (!$presenca)
        {
            return Response::json(['response' => 'presenca não encontrado'], 400);
        } 
        
        return Response::json($presenca->with(['reuniao', 'membro'])->get(), 200);        

    }


    public function updatePresenca(Request $request)
    {

        $input = $request->all();
        
        $presenca = $this->presenca->updatePresenca($input);
        
        if (!$presenca)
        {
            return Response::json(['response' => ''], 400);
        }
        return Response::json($presenca, 200);
    }



}
