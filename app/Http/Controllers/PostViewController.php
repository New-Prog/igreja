<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Post;
use Response;



class PostViewController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
   
    }

    public function viewPosts()
    {

        $posts = $this->post->allPosts();

        if (!$posts)
        {
            return Response::json(['response' => ''], 400);
        }
        return view('posts_cadastrar')->renderSections()['conteudo'];
    }
    public function allPosts()
    {

        $post = $this->post->allPosts();

        if (!$post)
        {
            return Response::json(['response' => ''], 400);
        }


        return view('posts_consultar')->with('posts', $post)->renderSections()['conteudo'];
    }
    public function getPost($id)
    {
        $post = $this->post->getPost($id);
        
        if (!$post)
        {
            return Response::json(['response' => ''], 400);
        }
     
        return Response::json( $post, 200);
    }

    public function savePost(Request $request)
    {
        
       $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,pdf,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        
        $request->image->move(public_path('images/eventos'), $imageName);
        
        $arr_ins = array(
            'nome'        => $request->nome, 
            'descricao'   => $request->descricao, 
            'tipo'        => $request->tipo, 
            'link_imagem' => public_path('images/eventos/'.$imageName), 
            'link'        => $request->link, 
            'data'        => $request->data, 
        );
        
        $post = $this->savePost($arr_ins);
    
        return view('posts_cadastrar')->with('post', $post);
        
    }


    public function updatePost($id , Request $request)
    {
        $input = $request->all();

        $post = $this->post->updatePost($id, $input);
        

        if (!$post)
        {
            return Response::json(['response' => ''], 400);
        } 


        return Response::json($post, 200);        
    }
}
