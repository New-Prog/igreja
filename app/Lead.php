<?php

namespace PriceSpy;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [ 'nome', 'email', 'empresa', 'cargo','ip'];

    protected $table = 'leads';
}