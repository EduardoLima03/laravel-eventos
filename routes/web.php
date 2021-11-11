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

    $nome = "Eduardo";
    $arr =[10, 20, 30, 40, 50];
    $nomes = ["Eduardo", "Tiago", "Lucas", "Pedro"];

    return view('welcome', ['nome' => $nome, 'arr' => $arr, 'nomes' => $nomes]);
});

Route::get('/contact', function (){
    return view('contact');
});

//Paramentros em rotas
Route::get('/product/{id?}', function ($id = 1){//permite chama a view sem para paramentro
    //paramentro pela url
    return view('product', ['id' => $id]);
});
Route::get('/products', function (){
    //paramentro pelo query
    $busca = require('search');
    return view('products', ['busca' => $busca]);
});