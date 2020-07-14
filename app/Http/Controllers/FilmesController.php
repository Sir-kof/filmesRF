<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filmes;
use App\Diretores;
use App\Atores;
use App\Alocacoes;

class FilmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filmes = Filmes::all();
        $n = empty($filmes);
        if($n) {
            return response('Nenhum filme encontrado.', 404);
        }
        return $filmes->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filmes = new Filmes();
        $filmes->nome = $request->nome;
        $filmes->sinopse = $request->sinopse;
        $filmes->diretor = $request->diretor;
        $filmes->atores = $request->atores;
        $filmes->classificacao = $request->classificacao;
        $filmes->date = $request->date;
        $filmes->save();

        $directorExists = Diretores::all()->where('nome', $request->diretor)->first();
        if(!$directorExists) {
            $diretor = new Diretores();
            $diretor->nome = $request->diretor;
            $diretor->save();
        }

        $atores = explode(',', $request->atores);
        $alocacoes = new Alocacoes();

        foreach ($atores as $a) {
            $actorExists = Atores::all()->where('nome', $a)->first();
            if(!$actorExists) {
                $ator = new Atores();
                $ator->nome = $a;
                $ator->save();
                $F = Filmes::all()->where('nome', $request->nome)->first();
                $D = Diretores::all()->where('nome', $request->diretor)->first();
                $A = Atores::all()->where('nome', $a)->first();
                $alocacoes->atores_id = $A->id;
                $alocacoes->filmes_id = $F->id;
                $alocacoes->diretores_id = $D->id;
                $alocacoes->save();
            } else {
                $F = Filmes::all()->where('nome', $request->nome)->first();
                $D = Diretores::all()->where('nome', $request->diretor)->first();
                $A = Atores::all()->where('nome', $a)->first();
                $alocacoes->atores_id = $A->id;
                $alocacoes->filmes_id = $F->id;
                $alocacoes->diretores_id = $D->id;
                $alocacoes->save();
            }
        }

        return response('Filme adicionado com sucesso.', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filme = Filmes::find($id);
        return json_encode($filme);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $filme = Filmes::find($id);
        if (isset($filme)) {
            if (isset($request->nome)) {
                $filme->nome = $request->nome;
            } else {
                $filme->nome = $filme->nome;
            }
            if (isset($request->sinopse)) {
                $filme->sinopse = $request->sinopse;
            } else {
                $filme->sinopse = $filme->sinopse;
            }
            if (isset($request->diretor)) {
                $filme->diretor = $request->diretor;
            } else {
                $filme->diretor = $filme->diretor;
            }
            if (isset($request->atores)) {
                $filme->atores = $request->atores;
            } else {
                $filme->atores = $filme->atores;
            }
            if (isset($request->classificacao)) {
                $filme->classificacao = $request->classificacao;
            } else {
                $filme->classificacao = $filme->classificacao;
            }
            if (isset($request->date)) {
                $filme->date = $request->date;
            } else {
                $filme->date = $filme->date;
            }
            $filme->save();
            return response('Filme editado.', 200);
        }
        return response('Filme não encontrado.', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filme = Filmes::find($id);
        if (isset($filme)) {
            $filme->delete();
            return response('Filme deletado.', 200);
        }
        return response('Filme não encontrado.', 404);
    }
}
