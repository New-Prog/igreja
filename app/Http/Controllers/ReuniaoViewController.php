<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
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
            // 
        	$presenca = new Presenca();
        	$arr_tmp['fk_reuniao'] = $reuniao->id;
        	$arr_tmp['fk_membro' ] = $membro->id;
        	$arr_tmp['presente'  ] = false;
        	
        	$presenca->savePresenca($arr_tmp);
        	unset($arr_tmp, $presenca);
        }

        $reunioes = $this->reuniao->allReunioes();
        
        return redirect()->route('viewReuniao');
        
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

        return Response::json($reuniao->with('celula')->get(), 200);        
    }    
    public function deleteReuniao($id)
    {
    	$this->reuniao->deleteReuniao();
    	
    	$presencas = Presenca::where('fk_reuniao', $reuniao->id);
    	
    	foreach ($presencas as $presencaErro) {
    		
    		Presenca::delete($presencaErro->id);
    		
    	}
    	
    	Reuniao::delete($id);
    	
    	
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
    	

    	
    	
    	
    	return Redirect::route('all');
    }
    
    

}
