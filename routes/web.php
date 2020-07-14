<?php

use Illuminate\Support\Facades\Route;

//Rota dos Filmes
Route::get('/filmes', 'FilmesController@index');
Route::post('/filmes', 'FilmesController@store');
Route::get('/filmes/{id}', 'FilmesController@show');
Route::post('/filmes/{id}', 'FilmesController@update');
Route::get('/filmes/deletar/{id}', 'FilmesController@destroy');

//Rota dos Atores
Route::get('/atores', 'AtoresController@index');
Route::post('/atores', 'AtoresController@store');
Route::get('/atores/{id}', 'AtoresController@show');
Route::post('/atores/{id}', 'AtoresController@update');
Route::get('/atores/deletar/{id}', 'AtoresController@destroy');

//Rota dos Diretores
Route::get('/diretores', 'DiretoresController@index');
Route::post('/diretores', 'DiretoresController@store');
Route::get('/diretores/{id}', 'AtoresController@show');
Route::post('/diretores/{id}', 'DiretoresController@update');
Route::get('/diretores/deletar/{id}', 'DiretoresController@destroy');
