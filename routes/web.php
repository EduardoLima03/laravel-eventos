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

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create']);

Route::get('/contact', function (){
    return view('contact');
});

//Paramentros em rotas
Route::get('/product/{id?}', function ($id = null){//permite chama a view sem para paramentro
    //paramentro pela url
    return view('product', ['id' => $id]);
});

Route::get('/products', function (){
    //paramentro pelo query
    $busca = request('search');
    return view('products', ['busca' => $busca]);
});