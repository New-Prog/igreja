<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';

    protected $fillable = ['nome', 'descricao', 'tipo', 'link_imagem', 'link', 'data'];


    public function allPosts()
    {
        return self::all();
    }

    public function savePost(array $arr)
    {
        $this->fill($arr)->save();

        return $this;
    }

    public function getPost($id)
    {
        $post = $this->find($id);

        if (is_null($post)) {
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

    public function deletePost($id)
    {
        $post = self::find($id);
        $post->delete();
        return;
    }
}
