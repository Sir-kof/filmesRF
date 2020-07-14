<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diretores extends Model
{
    protected $table = 'diretores';

    function filmes() {
        return $this->hasMany('App\Filmes');
    }
}
