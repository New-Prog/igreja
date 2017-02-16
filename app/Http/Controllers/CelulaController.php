<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;

use App\Celula;

// use App\Http\Requests;
use App\User;
use Request;
use Response;


class CelulaController extends Controller
{
    protected $celula;
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Celula $celula)
    {
        $this->celula = $celula;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('view_celulas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {

        $celulas =  Celula::all();
        return response()->json($celulas, 200);
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

        Celula::create($request->all());

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

        $celula = Celula::find($request->input('id'));
        $celula->fill($request->all());



        // dd($celula->fill);
        $celula->save();
        return response()->json(['OK' => 'Sucesso '], 200);
        // return response()->json($celula, 201);
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
    
    
    
    
    public function allCelulas()
    {
        return Response::json($this->celula->allCelulas(), 200);
    }
    
    public function getCelula($id)
    {
        $celula = $this->celula->getCelula($id);
        
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
     
        return Response::json( $celula, 200);
    }
    
    public function saveCelula()
    {
        return Response::json($this->celula->saveCelula(), 200);        
    }
    
    public function updateCelula($id)
    {
        $celula = $this->celula->updateCelula($id);
        
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
     
        return Response::json($celula, 200);
        
    }
    
    public function deleteCelula($id)
    {
        $celula = $this->celula->deleteUser($id);
        if (!$celula)
        {
            return Response::json(['response' => 'Célula não encontrada'], 400);
        }
        return Response::json(['response' => 'Célula removida'], 200);        
    }
}
