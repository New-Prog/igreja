<?php

namespace App\Http\Controllers;

use App\Membro;
use App\Reuniao;
use App\Post;
use App\Celula;

use Response;
#use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /*
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

        return view('dashboard');
    }
    public function getDadosDashboard()
    {
        $arr_return = [];

        // qtd membros cadastrados ultimos 7 dias

        $sete_dias = date('Y-m-d H:i:s', strtotime('-7 days', strtotime(date('Y-m-d H:i:s'))));

        $arr_return['qtd_membros_ult_sete_dias'] = Membro::where("created_at", ">", $sete_dias)->count();

        // qtd reunioes realizadas ultimos 7 dias
        $arr_return['qtd_reunioes_ult_sete_dias'] = Reuniao::where("created_at", ">", $sete_dias)->count();

        // qtd postagens nos posts nos ultimos 7 dias
        $arr_return['qtd_posts_ult_sete_dias'] = Post::where("created_at", ">", $sete_dias)->count();

        // lista de qtd de membros por celular

        $celulas = Celula::select(['id', 'nome'])->limit('10')->get();

        $celulas->load('membro');

        foreach ($celulas as $key => $celula) {

            $arr_return['celula'][] = [
                    'id_celula'  =>  $celula->id,
                    'nome'       =>  $celula->nome,
                    'qtd_membro' => $celula->membro->count(),
            ];
        }

        return Response::json($arr_return, 200);
    }
}