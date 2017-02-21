<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';

    protected $fillable = ['titulo', 'descricao', 'tipo'];
    

    public function allPosts()
    {
        return self::all(); 
    }
     
    public function savePost($request)
    {

        // dd(http_request(method, url))

        // $input = Request::all();
        // $input['password'] = Hash::make($input['password']);
        // $user = new User();
        //$user->fill($input); // Mass assignment
        //$user->save();
        // return $user;
        
    }
    
    public function getPost($id)
    {
        $post = self::find($id);
        
        if (is_null($post))
        {
            return false;
        }
        
        return $post;
        
    }
    
    public function updatePost($id)
    {
        $post = self::find($id);
        
        if (is_null($post)) 
        {
            return false;
        }
       
        $input = Request::all();
        
        // if (isset($input['password'])) {
        //     $input['password'] = Hash::make($input['password']);
        // }
        
        $post->fill($input); // Mass assignment
        $post->save();
        return $post;
        
    }
    
}
