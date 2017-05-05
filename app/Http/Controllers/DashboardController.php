<?php

namespace App\Http\Controllers;

use App\Membro;
use App\Reuniao;
use App\Post;
use App\Celula;

#use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        
        $arr_return = [];
        
        // qtd membros cadastrados ultimos 7 dias 

        $sete_dias = date('Y-m-d H:i:s', strtotime('-7 days', strtotime(date('Y-m-d H:i:s'))));
        
        $arr_return['qtd_membros_ult_sete_dias'] = Membro::where("created_at", ">", $sete_dias)->count();
       
        // qtd reunioes realizadas ultimos 7 dias
        $arr_return['qtd_reunioes_ult_sete_dias'] = Reuniao::where("created_at", ">", $sete_dias)->count();
        
        // qtd membros que vistaram nos ultimos 7 dias  -- Nao existe esta informacao
        

        // qtd postagens nos posts nos ultimos 7 dias 
        $arr_return['qtd_posts_ult_sete_dias'] = Post::where("created_at", ">", $sete_dias)->count();
                
        // lista de qtd de membros por celular 
      
        $celulas = Celula::all();
        
        foreach ($celulas as $celula => $attr) {
            
            $arr_return['celula'][] = [
                    'id_celula'  =>  $attr['id'],
                    'nome'       =>  $attr['nome'],
                    'qtd_membro' =>  Membro::where("fk_celula", "=" , $attr['id'])->count(),
            ];
        }
        
        
         
        //dd($arr_return);
        
        // Nome idade sexo, endereco e foto dos 3 ultimos membros adicionados 
        
        
        // 3 ultimos pedido de oracao
        
        
        
        return view('dashboard')->with('arr_dados', $arr_return);
    }

}