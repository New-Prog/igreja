<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Membro;
use Request;
use Validator;
use Response;

class MembrosController extends Controller{
    
    public function listar(){
        // $membros =  DB::select('select * from membros');
        // return view('listagem')->with('membros', $membros);
        $membros =  Membro::all();
        return response()->json($membros);
    }

    public function cadastrar(){

        return view('cadastrarMembro');

    }
    
     public function mostrar(){

        return view('membros');

    }
}
