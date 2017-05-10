<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MembroRequest;
use App\Membro;
use App\Celula;
use Response;
class LoginApiController extends Controller
{

    protected $membro;
    protected $celula;

    public function __construct(Membro $membro)
    {
        $this->membro = $membro;
    }
    public function getUsuario(Request $request)
    {
    	$arr = $request->only(['cpf', 'email']);

        $membro = $this->membro->getMembroByCpfEmail($arr);
        
        if (!$membro) 
        {
            return Response::json(['fk_celula' => 0], 400);
        }    
        return Response::json($membro, 200);
    }
}
