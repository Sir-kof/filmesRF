<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atores extends Model
{
    protected $table = 'atores';

    function filmes() {
        return $this->hasMany('App\Filmes');
    }

}
