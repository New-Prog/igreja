<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Membro;
use App\Celula;
use App\Endereco;

// use App\Http\Requests;
use App\User;
// use Request;
use Response;


class MembroController extends Controller
{
    protected $membro;
    protected $celula;
    protected $endereco;

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

        $membro = $this->membro->with(['endereco', 'celula'])->get();
        // $membro['TESTE'] = 'ROLA';
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
    public function saveMembro(Request $request)
    {
        $input = $request->all();
        // dd($input);

        $this->endereco = new Endereco();

        $arr_ins_endereco  = array(
            'tipo' => $input['tipo_end'],
            'logradouro' => $input['logradouro'],
            'numero' => $input['numero'],
            'cep' => $input['cep'],
            'bairro' => $input['bairro'],
            'cidade' => $input['cidade'],
            'latitude' => $input['latitude'],
            'logitude' => $input['logitude'],
        );

        // $this->endereco->setTipo($input['tipo']);

        $this->endereco = $this->endereco->saveEndereco($arr_ins_endereco);
        
        
        $fk_endereco = $this->endereco->id;

        $fk_celula =  $input['fk_celula'];


        unset($arr_ins_endereco, $this->endereco); // GARANTINDO QUE NAO VAI TER PROBLEMAS COM CACHED

        $arr_ins_membro = array(
            'nome' => $input['nome'],
            'sexo' => $input['sexo'],
            'cpf' => $input['cpf'],
            'email' => $input['email'],
            'dt_nasc' => '19960219',
            'tipo' => $input['tipo'],
            'telefone' => $input['telefone'],
            'celular' => $input['celular'],
            'fk_endereco' => $fk_endereco,
            'fk_celula' => $fk_celula,
        );

        $membro = $this->membro->saveMembro($arr_ins_membro);

        unset($arr_ins_membro); // GARANTINDO QUE NAO VAI TER PROBLEMAS COM CACHED
        
        $membro = $this->membro->with(['endereco', 'celula'])->get();

        if (!$membro)
        {
            return Response::json(['response' => 'Membro não encontrado'], 400);
        } 


        return Response::json($membro, 200);        
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
