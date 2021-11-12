<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product($id = null){//permite chama a view sem para paramentro
        //paramentro pela url
        return view('products.product', ['id' => $id]);
    }
    public function products(){
        //paramentro pelo query
        $busca = request('search');
        return view('products.products', ['busca' => $busca]);
    }
}
