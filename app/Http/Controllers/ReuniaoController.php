<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Reuniao;
use App\Celula;
use App\Presenca;
use App\Membro;


class ReuniaoController extends Controller
{
	
    protected $reuniao;

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

        return Response::json($reuniao, 200);
    }

    public function getReuniao($id)
    {
        $reuniao = $this->reuniao->getReuniao($id)->with('celula')->get();
        
        if (!$reuniao)
        {
            return Response::json(['response' => ''], 400);
        }
        
        return Response::json( $reuniao[$id - 1], 200);
    }
    

    public function saveReuniao(Request $request)
    {

    	try {
    	
	    	$input = $request->all();
	    	
	    	if (empty($input['fk_reuniao'])) throw new Exception("Código da reunião não informado.", 400);
	    	if (empty($input['fk_membro'])) throw new Exception("Código do membro não informado.", 400);
	    		    	
	        $reuniao = $this->reuniao->saveReuniao($input);
	        
	        if (!$reuniao)
	        {
	        	throw new Exception("Reunião não cadastrada", 400);
	        }
	        
	        $membros = Membro::getMembroByCelulaAPI($reuniao['fk_celula']);
	        
	        $presenca = new Presenca();
	        
	        foreach ($membros as $membro) {
	        	
	        	$response = $presenca->savePresenca([
	        		'fk_reuniao' => $reuniao->id,
	        		'fk_membro' => $membro->id,
	        		'presente' => false,
	        	]);
	        	
	        	$response = filter_var($response, FILTER_VALIDATE_BOOLEAN);
	        	
	        	if ($response === false) {
					
					$presencas = Presenca::where('fk_reuniao', $reuniao->id);
					
					foreach ($presencas as $presencaErro) {
					
						Presenca::delete($presencaErro->id);
						
					}
					
					Reuniao::delete($reuniao->id);
					
					throw new Exception("Não foi possivel cadastrar nova reunião.", 400);
					
				}
				
	        	unset($arr_tmp);
	        }
	        
	        return Response::json($reuniao->with(['reuniao', 'membro'])->get(), 200);
	        
    	} catch (Exception $e) {
    		
    		return Response::json(['response' => $e->getMessage()], $e->getCode());
    		
    	}

    }

    public function updateReuniao($id , Request $request)
    {
        $input = $request->all();

        $reuniao = $this->reuniao->updateReuniao($id, $input);
        

        if (!$reuniao)
        {
            return Response::json(['response' => ''], 400);
        } 

        return Response::json($reuniao->with(['reuniao', 'membro'])->get(), 200);        
    }    

}
