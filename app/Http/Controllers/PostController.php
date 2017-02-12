<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Post;

class PostController extends Controller
{
    public function VemNiMimView()
    {
        return view('blog');
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(),[
    		'autor' => 'required|min:5',
    		'titulo' => 'required|min:5',
    		'descricao' => 'required|min:5'
    	]);

    	if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        $data = [
            'autor'     => $request->input('autor'),
            'titulo'  => $request->input('titulo'),
            'descricao'    => $request->input('descricao')
        ];

    	Post::create($data);

    	return response()->json(['OK' => 'Sucesso '], 200);
    }
}
