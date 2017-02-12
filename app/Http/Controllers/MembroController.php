<?php

namespace PriceSpy\Http\Controllers;

// use Illuminate\Http\Request;

use PriceSpy\Http\Requests;

use PriceSpy\Membro;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar(){

        // $membros =  DB::select('select * from membros');

        // return view('listagem')->with('membros', $membros);
        $membros =  Membro::all();
        return response()->json($membros, 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return view('detalhes')->with('p', $produto);
        // dd($request->all());

        $membro = Membro::find($request->input('id'));
        $membro->fill($request->all());



        // dd($membro->fill);
        $membro->save();
        return response()->json(['OK' => 'Sucesso '], 200);
        // return response()->json($membro, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function allMembros()
    {
        return Response::json($this->membro->allMembros(), 200);
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
    
    
    
    /*
        // Route::get('', ['membro' => 'MembroController@allMembros']);   
        
        Route::get('{id}',  ['membro' => 'MembroController@getMembro']);    
        Route::get('app/{id}',  ['membro' => 'MembroController@getMembrosByLider']);    
        
        Route::post('',  ['membro' => 'MembroController@saveMembro']);     
        Route::post('up/{id}',  ['membro' => 'MembroController@updateMembro']);     
        Route::post('del/{id}',  ['membro' => 'MembroController@deleteMembro']);
    */
    
    
}
