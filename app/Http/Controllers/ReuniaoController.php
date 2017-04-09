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
        
        return Response::json( $reuniao, 200);
	}
	public function saveReuniao(Request $request) {
		$input = $request->all ();
		
		if (empty ( $input ['fk_reuniao'] ))
			Response::json(['response' => "Código da reunião não informado."], 400 );
		if (empty ( $input ['fk_membro'] ))
			Response::json(['response' => "Código do membro não informado."], 400 );
			
		$reuniao = $this->reuniao->saveReuniao( $input );
		
		if (! $reuniao) 
			Response::json(['response' => "Reunião não cadastrada"], 400 );
		
			
			
		$membros = Membro::getMembroByCelulaAPI( $reuniao->fk_celula );
		
		
		
		foreach ( $membros as $membro ) {
			dd($membro->id);
			$presenca = new Presenca ();
			$presenca->savePresenca ( [ 
					'fk_reuniao' => $reuniao->id,
					'fk_membro' => $membro->id,
					'presente' => false 
			] );
			
			unset ( $arr_tmp );
			
			if (! $presenca) {
				
				Presenca::where ( 'fk_reuniao', $reuniao->id )->delete ();
				Reuniao::delete ( $reuniao->id );
				Response::json(['response' => "Não foi possivel cadastrar nova reunião."], 400 );
			}
		}
	        
        return Response::json($reuniao->with(['celula'])->get(), 200);
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
    
    public function deleteReuniao($id)
    {
    	Presenca::where('fk_reuniao', $id)->delete();
    	$this->reuniao->deleteReuniao($id);
    	return Response::json(['response' => 'OK'], 200);
    }

}
