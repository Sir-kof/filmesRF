<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atores;
use App\Alocacoes;

class AtoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atores = Atores::with('filmes')->get();
        $n = empty($atores);
        if($n) {
            return response('Nenhum ator encontrado.', 404);
        }
        return $atores->toJson();
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
        $ator = new Atores();
        $ator->nome = $request->nome;
        $ator->idade = $request->idade;
        $ator->filmes = $request->filmes;
        $ator->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atores = Atores::find($id);
        return json_encode($atores);
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
        $ator = Atores::find($id);
        if (isset($ator)) {
            if (isset($request->nome)) {
                $ator->nome = $request->nome;
            } else {
                $ator->nome = $ator->nome;
            }
            if (isset($request->idade)) {
                $ator->idade = $request->idade;
            } else {
                $ator->idade = $ator->idade;
            }
            $ator->save();
            return response('Ator editado.', 200);
        }
        return response('Ator não encontrado.', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ator = Atores::find($id);
        if (isset($ator)) {
            $ator->delete();
            return response('Ator deletado.', 200);
        }
        return response('Ator não encontrado.', 404);
    }
}
