<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Response;
use Illuminate\Support\Facades\Input;

class PostViewController extends Controller
{
    protected $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
   
    }

    public function viewPosts()
    {
        return view('posts_cadastrar')->renderSections()['conteudo'];
    }

    public function allPosts()
    {
        $post = $this->model->allPosts();

        if (!$post)
        {
            return Response::json(['response' => ''], 400);
        }


        return view('posts_consultar')->with('posts', $post)->renderSections()['conteudo'];
        
    }

    public function getPost($id)
    {
        $post = $this->model->getPost($id);
        
        if (!$post)
        {
            return Response::json(['response' => ''], 400);
        }
     
        return Response::json( $post, 200);
    }

    public function savePost(Request $request)
    {

    	$tipo = $request->input('tipo');
    	
    	if($tipo == 'imagem') {
    		$imageName = time().'.'.$request->file('imagem')->getClientOriginalExtension();
    		$request->file('imagem')->move(public_path('images/eventos'), $imageName);
    	}
        
        $arr_ins = array(
            'nome'        => $request->nome, 
            'descricao'   => $request->descricao, 
            'tipo'        => $request->tipo, 
            'link_imagem' => ($tipo == 'imagem') ? public_path('images/eventos/'.$imageName) : '', 
            'link'        => $request->link, 
            'data'        => $request->data, 
        );
        
        $post = $this->model->create($arr_ins);
    	
        return view('posts_cadastrar')->with('post', $post);
    }


    public function updatePost($id , Request $request)
    {
        $input = $request->all();

        $post = $this->model->updatePost($id, $input);
        

        if (!$post)
        {
            return Response::json(['response' => ''], 400);
        } 


        return Response::json($post, 200);        
    }
}
