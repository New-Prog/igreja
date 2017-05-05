<?php

namespace App\Http\Controllers;


use App\Services\LocationService;
use App\Reuniao;

class TesteController extends Controller
{
	protected $reuniao;
	
	public function __construct(Reuniao $reuniao)
	{
		$this->reuniao = $reuniao;
	}
	
	public function  getCordinates() {
		$address = 'Av Paulista 2202';
		$address = str_replace(" ", "+", $address);
		
		$location =  new LocationService();
		dd($location->getCordinates($address));
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
		
		return Response::json($reuniao, 200);
	}
	
	
	public function updateReuniao($id , Request $request)
	{
		$input = $request->all();
		
		$reuniao = $this->reuniao->updateReuniao($id, $input);
		
		if (!$reuniao)
		{
			return Response::json(['response' => ''], 400);
		}
		
		return Response::json($reuniao->with(['celula'])->get(), 200);
	}
}
