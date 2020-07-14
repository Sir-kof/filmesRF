<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filmes extends Model
{
    protected $table = 'filmes';

    public function diretores() {
        return $this->hasOne('App\Diretores');
    }

    function atores() {
        return $this->belongsToMany('App\Atores', 'alocacoes');
    }
}
