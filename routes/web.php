<?php

use Illuminate\Support\Facades\Route;

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
    $usuariosActivos = \App\Usuario::where('codigo', 1)->get();
    $usuariosInactivos = \App\Usuario::where('codigo', 2)->get();
    $usuariosEspera = \App\Usuario::where('codigo', 3)->get();

    return view('form.form', compact('usuariosActivos', 'usuariosInactivos', 'usuariosEspera'));
});
Route::patch('/edit/{id}', 'UsuarioController@update');
Route::get('/delete/{id}', 'UsuarioController@destroy');
Route::post('analizarTxt', 'UsuarioController@analizarTxt');
