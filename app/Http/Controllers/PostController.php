<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Response;



class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
   
    }

    public function allPosts()
    {
        $post = $this->post->all();
		
        if (!$post)
        {
            return Response::json(['response' => ''], 400);
        }

        return Response::json($post, 200);
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
        
        return Response::json($post, 200);        

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
