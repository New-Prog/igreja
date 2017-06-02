<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Response;
use App\Mensagem;

class MensagemController extends Controller
{
	protected $model;

	public function __construct(Mensagem $model)
	{
		$this->model = $model;

	}

	public function save(Request $request)
	{
		$this->validate($request, [
				'nome' => 'required',
				'telefone' => 'required',
				'descricao' => 'required',
				'email' => 'required'
		]);

		$input = $request->all();

		$mensagem = $this->model->saveMensagem($input);

		if (!$mensagem)
		{
			return Response::json(['response' => 'post não encontrado'], 400);
		}

		return Response::json($mensagem, 200);

	}

	public function list(Request $request)
	{
		return $this->model->get();
	}

}
