<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\MembroRequest;

use App\Membro;
use App\Celula;
use Response;


class MembroViewController extends Controller
{
    protected $membro;
    protected $celula;
    public function __construct(Membro $membro)
    {
        $this->membro = $membro;
    }
    public function index()
    {
        return view('view_membros')->renderSections()['conteudo'];
    }
    public function viewMembro()
    {
        return view('membros_cadastrar')->with('celulas', Celula::all())->renderSections()['conteudo'];
    }
    public function allMembros()
    {
        $membro = $this->membro->with('celula')->get();

        if (!$membro)
        {
            return Response::json(['response' => 'Membro não encontrado'], 400);
        }
        return view('membros_consultar')->with('membros', $membro)->renderSections()['conteudo'];

    }
    public function getMembro($id)
    {
        $membro = $this->membro->getMembro($id);

        if (!$membro)
        {
            return Response::json(['response' => 'Membro não encontrado'], 400);
        }

        return view('membros_consultar')->with('membros', $membro)->renderSections()['conteudo'];

        // return $membro;
    }
    public function saveMembro(Request $request)
    {
        $input = $request->all();

		$input['fk_celula'] = !$input['fk_celula'] ? null : $input['fk_celula'];
        $membro = $this->membro->saveMembro($input);

        if (!$membro)
        {
            //return Response::json(['response' => 'Membro não encontrado'], 400);
        }

        $membros = $this->membro->with('celula')->get();

        return view('membros_consultar')->with('membros', $membros);
    }
    public function getMembroEspecifico(Request $request)
    {
        // dd($request->filtro);
        switch ($request->filtro) {
            case 'cpf':
                $membro = $this->membro->getMembroByCPF(trim($request->conteudo_filtro));
                break;
            case 'nome':
                $membro = $this->membro->getMembroByNome($request->conteudo_filtro);
                break;
            case 'fk_celula':
                $membro = $this->membro->getMembroByCelula($request->conteudo_filtro);
        }
        // dd($membro);
        // $membros = $membro->with('celula')->get();

        return Response::json($membro, 200);


        // return view('membros_consultar')->with('membros', $membros);
    }
    public function updateMembro($id , Request $request)
    {
        $input = $request->all();

        $input['fk_celula'] = !$input['fk_celula'] ? null : $input['fk_celula'];

        $membro = $this->membro->updateMembro($id , $input);


        if (!$membro)
        {
            return Response::json(['response' => 'Membro não encontrado'], 400);
        }

        $membros = $this->membro->with('celula')->get();
        return view('membros_consultar')->with('membros', $membros);

    }
    public function alterarMembro($id)
    {
        $membro = $this->membro->getMembro($id);

        return view('membros_cadastrar')->with(['membro' => $membro, 'celulas' => Celula::all()])->renderSections()['conteudo'];

    }

    public function deleteMembro($id)
    {
    	Celula::where('lider', $id)->update(['lider'=> null]);

        $this->membro->deleteMembro($id);
        return Redirect::route('allMembros');
    }


}
