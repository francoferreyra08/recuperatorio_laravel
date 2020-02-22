<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('/peliculas', 'PeliculasController@Peliculas');


route::get('/actores', 'ActorController@Directory');

route::get('/actores/{id}', 'ActoresController@detalle');

route::get('/agregarpeli', function(){
  return view("agregarPelicula");
});
route::post('/agregarpeli', 'peliculaController@insertar');

route::post('buscarpeli', 'peliculaController@buscar');
