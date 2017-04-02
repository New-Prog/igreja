<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Response;

use App\Reuniao;
use App\Celula;
use App\Membro;
use App\Presenca;


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
    }
    public function saveReuniao(Request $request)
    {
        $input = $request->all();

        $reuniao = $this->reuniao->saveReuniao($input);

        if (!$reuniao)
        {
            return Response::json(['response' => 'reuniao não encontrado'], 400);
        } 
        
        $membros = Membro::getMembroByCelula($input['fk_celula']);
        
        foreach ($membros as $membro) {
        	
        	$presenca = new Presenca();
        	$tmp['fk_reuniao'] = $reuniao->id;
        	$tmp['fk_membro' ] = $membro->id;
        	$tmp['presente'  ] = false;
        	
        	$presenca->savePresenca($tmp);
        	
        	unset($tmp, $presenca);
        }

        $reuniao = $this->reuniao->with('celula')->get();
        
        return view('reunioes_consultar')->with('reunioes', $reuniao);
                
    }
    public function alterarReuniao($id)
    {
        $reuniao = $this->reuniao->getReuniao($id); 
        if (!$reuniao)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
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
        $reuniao = $this->reuniao->with('celula')->get();
        
        return view('reunioes_consultar')->with('reunioes', $reuniao);
              
    }    
    public function deleteReuniao($id)
    {
    	Presenca::where('fk_reuniao', $id)->delete();
    	$this->reuniao->deleteReuniao($id);
    	
    	$reuniao = $this->reuniao->with('celula')->get();
    	
    	if (!$reuniao)
    	{
    		return Response::json(['response' => ''], 400);
    	}
    	
    	return view('reunioes_consultar')->with('reunioes', $reuniao)->renderSections()['conteudo'];
    	
    	
    	try {
    		
    		
    		$membros = Membro::getMembroByCelulaAPI($id);
    		
    		$presenca = new Presenca();
    		
    		foreach ($membros as $membro) {
    			
    			$response = $presenca->savePresenca([
    					'fk_reuniao' => $reuniao->id,
    					'fk_membro' => $membro->id,
    					'presente' => false,
    			]);
    			
    			$response = filter_var($response, FILTER_VALIDATE_BOOLEAN);
    			
    			if ($response === false) {
    				

    				
    				throw new Exception("Não foi possivel cadastrar nova reunião.", 400);
    				
    			}
    			
    			unset($arr_tmp);
    		}
    		
    		return Response::json($reuniao->with(['reuniao', 'membro'])->get(), 200);
    		
    	} catch (Exception $e) {
    		
    		return Response::json(['response' => $e->getMessage()], $e->getCode());
    		
    	}
    	return Response::json($reuniao, 200);
    }
    
    
}
