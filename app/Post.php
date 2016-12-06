<?php

namespace PriceSpy;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';

    protected $fillable = ['autor','titulo', 'descricao'];
}
