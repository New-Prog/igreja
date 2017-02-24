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
     
    public function savePost($arr)
    {
        $input = $arr;
        
        $post = new Post();
        
        $post->fill($input);

        $post->save();

        return $post;
        
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
    
    public function updatePost($id, $arr_up_post)
    {
        $post = self::find($id);
        
        if (is_null($post)) 
        {
            return false;
        }
       
        $input = $arr_up_post;
        
        $post->fill($input); // Mass assignment
        $post->save();
        return $post;
        
    }
    
}
