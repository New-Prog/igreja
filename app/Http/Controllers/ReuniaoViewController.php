<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Reuniao;
use App\Celula;
use App\Membro;
use App\Presenca;
use App\Services\LocationService;


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
    	
    }
    public function getReuniaoEspecifico(Request $request)
    {
    	$reuniao = $this->reuniao->getReuniaoByCelula($request->conteudo_filtro);
    	return Response::json($reuniao, 200);
    }
    
    public function getInfosMapa () 
    {
        return $reuniao = $this->reuniao->with('celula')->get();
    }
}