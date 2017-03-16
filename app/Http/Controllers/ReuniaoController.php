<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Reuniao;
use App\Celula;
use Response;



class ReuniaoController extends Controller
{
	
    protected $reuniao;

    public function __construct(Reuniao $reuniao)
    {
        $this->reuniao = $reuniao;
   
    }

    public function allReunioes()
    {
        $reuniao = $this->reuniao->with('celulas')->get();
        
        if (!$reuniao)
        {
            return Response::json(['response' => ''], 400);
        }

        return Response::json($reuniao, 200);
    }

    public function getReuniao($id)
    {
        $reuniao = $this->reuniao->getReuniao($id);
        
        if (!$reuniao)
        {
            return Response::json(['response' => ''], 400);
        }
     
        return Response::json( $reuniao->with('celula')->get(), 200);
    }

    public function saveReuniao(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $reuniao = $this->reuniao->saveReuniao($input);

        if (!$reuniao)
        {
            return Response::json(['response' => 'reuniao não encontrado'], 400);
        } 
        
        return Response::json($reuniao->with('celula')->get(), 200);        

    }

    public function updateReuniao($id , Request $request)
    {
        $input = $request->all();

        $reuniao = $this->xreuniao->updateReuniao($id, $input);
        

        if (!$reuniao)
        {
            return Response::json(['response' => ''], 400);
        } 

        return Response::json($reuniao->with('celula')->get(), 200);        
    }    

}
