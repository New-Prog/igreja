<?php

namespace PriceSpy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use PriceSpy\Http\Requests;
use PriceSpy\Lead;

class LeadController extends Controller
{
    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(),[
    		'nome' => 'required|min:6|max:255',
    		'empresa' => 'required|min:3',
            'email' => 'required'
    	]);

    	if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        $data = [
            'nome'     => $request->input('nome'),
            'empresa'  => $request->input('empresa'),
            'cargo'    => $request->input('cargo'),
            'email'    => $request->input('email'),
            'ip'       => $request->ip()
        ];

    	Lead::create($data);

    	return response()->json(['OK' => 'Sucesso']);
    }
}
