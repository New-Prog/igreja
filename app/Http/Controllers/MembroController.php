<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;

use App\Membro;

// use App\Http\Requests;
use App\User;
use Request;
use Response;


class MembroController extends Controller
{
    protected $membro;
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Membro $membro)
    {
        $this->membro = $membro;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('view_membros');
    }

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'autor' => 'required|min:5',
        //     'titulo' => 'required|min:5',
        //     'descricao' => 'required|min:5'
        // ]);

        // if($validator->fails()) {
        //     return response()->json(['error'=>$validator->errors()->all()]);
        // }

        // $data = [
        //     'autor'     => $request->input('autor'),
        //     'titulo'  => $request->input('titulo'),
        //     'descricao'    => $request->input('descricao')
        // ];

        Membro::create($request->all());

        return response()->json(['OK' => 'Sucesso '], 200);
    }

    
    public function allMembros()
    {
        $membro = $this->membro->with(['endereco', 'celula', 'hierarquia'])->get();
        return Response::json($membro, 200);
    }
    public function getMembro($id)
    {
        $membro = $this->membro->getMembro($id);
        
        if (!$membro)
        {
            return Response::json(['response' => 'Membro não encontrado'], 400);
        }
     
        return Response::json( $membro, 200);
    }
    public function saveMembro()
    {
        return Response::json($this->membro->saveMembro(), 200);        
    }
    public function updateMembro($id)
    {
        $membro = $this->membro->updateMembro($id);
        
        if (!$membro)
        {
            return Response::json(['response' => 'Membro não encontrado'], 400);
        }
     
        return Response::json($membro, 200);
        
    }
    public function deleteMembro($id)
    {
        $membro = $this->membro->deleteUser($id);
        if (!$membro)
        {
            return Response::json(['response' => 'Usuário não encontrado'], 400);
        }
        return Response::json(['response' => 'Usuário removido'], 200);        
    }
}
