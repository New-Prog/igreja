<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Reuniao;
use App\Celula;
use Response;
use App\User;




class ReuniaoViewController extends Controller
{
	
    protected $reuniao;
    protected $celula;


    public function __construct(Reuniao $reuniao)
    {
        $this->reuniao = $reuniao;
   
    }

    public function allReunioes()
    {
        $reuniao = $this->reuniao->with('celula')->get();

        if (!$reuniao)
        {
            return Response::json(['response' => ''], 400);
        }

        return view('reunioes_consultar')->with('reunioes', $reuniao)->renderSections()['conteudo'];

        // return Response::json($reuniao->with('celula')->get(), 200);
    }
    public function viewReuniao()
    {
        return view('reunioes_cadastrar')->with('celulas', Celula::all())->renderSections()['conteudo'];
    }

    public function getReuniao($id)
    {
        $reuniao = $this->reuniao->getReuniao($id);
          
        if (!$reuniao)
        {
            return Response::json(['response' => ''], 400);
        }
        return view('reunioes_cadastrar')->$reuniao->with('celula')->get()->renderSections()['conteudo'];        

        // return Response::json( $reuniao->with('celula')->get(), 200);
    }

    public function saveReuniao(Request $request)
    {
        $input = $request->all();

        $reuniao = $this->reuniao->saveReuniao($input);

        if (!$reuniao)
        {
            //return Response::json(['response' => 'reuniao não encontrado'], 400);
        } 
        $reunioes = $this->reuniao->allReunioes();

        
        return view('reunioes_consultar')->with('reunioes', $reunioes);

    }

    public function alterarReuniao($id)
    {
        $reuniao = $this->reuniao->getReuniao($id); 
        if (!$reuniao)
        {
            // return Response::json(['response' => 'Célula não encontrada'], 400);
        }
        return view('reunioes_cadastrar')->with(['reuniao'=>$reuniao, 'celulas' => Celula::all()])->renderSections()['conteudo'];
    }


    public function updateReuniao($id , Request $request)
    {
        $input = $request->all();

        $reuniao = $this->reuniao->updateReuniao($id, $input);
        

        if (!$reuniao)
        {
            return Response::json(['response' => ''], 400);
        } 

        return Response::json($reuniao->with('celula')->get(), 200);        
    }    

}
