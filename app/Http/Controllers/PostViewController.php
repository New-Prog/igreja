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

    // public function VemNiMimView()
    // {
    //     return view('blog');
    // }
    
    public function allPosts()
    {

        $post = $this->post->allPosts();

        if (!$post)
        {
            return Response::json(['response' => ''], 400);
        }

        return Response::json($post, 200);
    }
    public function viewPosts()
    {

        $posts = $this->post->allPosts();

        if (!$posts)
        {
            return Response::json(['response' => ''], 400);
        }

        return view('posts_consultar')->with('posts', $posts)->renderSections()['conteudo'];
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
        $input = $request->all();

        $post = $this->post->savepost($input);

        if (!$post)
        {
            return Response::json(['response' => 'post não encontrado'], 400);
        } 
        
        $posts = $this->post->allPosts();
        return view('posts_consultar')->with('posts', $posts);

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