<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diretores;

class DiretoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diretores = Diretores::with('filmes')->get();
        $n = empty($diretores);
        if($n) {
            return response('Nenhum diretor encontrado.', 404);
        }
        return $diretores->toJson();
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
        $diretor = new Diretores();
        $diretor->nome = $request->nome;
        $diretor->idade = $request->idade;
        $diretor->filmes = $request->filmes;
        $diretor->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diretores = Diretores::find($id);
        return json_encode($diretores);
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
        $diretor = Diretores::find($id);
        if (isset($diretor)) {
            if (isset($request->nome)) {
                $diretor->nome = $request->nome;
            } else {
                $diretor->nome = $diretor->nome;
            }
            if (isset($request->idade)) {
                $diretor->idade = $request->idade;
            } else {
                $diretor->idade = $diretor->idade;
            }
            $diretor->save();
            return response('Diretor editado.', 200);
        }
        return response('Diretor não encontrado.', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diretor = Diretores::find($id);
        if (isset($diretor)) {
            $diretor->delete();
            return response('Diretor deletado.', 200);
        }
        return response('Diretor não encontrado.', 404);
    }
}
