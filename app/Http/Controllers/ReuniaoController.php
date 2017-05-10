<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Reuniao;
use App\Celula;
use App\Presenca;
use App\Membro;
use App\Services\LocationService;


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
        $reuniao = $this->reuniao->getReuniao($id)->load('celula');
        
        if (!$reuniao)
        {
            return Response::json(['response' => ''], 400);
        }
        
        return Response::json( $reuniao, 200);
	}

    public function getReuniaoByCelula($id)
    {
        $reuniao = $this->reuniao->getReuniaoByCelula($id);
        
        if (!$reuniao)
        {
            return Response::json(['response' => ''], 400);
        }
        
        return Response::json( $reuniao, 200);
	}	
	public function saveReuniao(Request $request) {
		$input = $request->all();
		
		$address = $input['logradouro'] . ' ' . $input['numero'];
		
		$address = str_replace(array(' ', ','), "+", $address);
		
		$location =  new LocationService();
		
		$cordinates = $location->getCordinates($address);

		if(isset($cordinates['error_message'])) {
			return Response::json(['response' => 'Ocorreu um erro: '. $cordinates['error_message']], 400);
		}
		
		$input['latitude'] = $cordinates['lat'];
		$input['longitude'] = $cordinates['lng'];
		
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
		
		return Response::json($reuniao->load('celula'), 200);
    }

    public function updateReuniao($id , Request $request)
    {
        $input = $request->all();

        $reuniao = $this->reuniao->updateReuniao($id, $input);
        
        if (!$reuniao)
        {
            return Response::json(['response' => ''], 400);
        } 

        return Response::json($reuniao->load('celula'), 200);        
    }
    
    public function deleteReuniao($id)
    {
    	Presenca::where('fk_reuniao', $id)->delete();
    	$this->reuniao->deleteReuniao($id);
    	return Response::json(['response' => 'OK'], 200);
    }

}
