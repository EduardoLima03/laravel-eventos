<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;//importa o model de acesso ao bd

class EventController extends Controller
{
    public function index(){
        $events = Event::all();//pega todos os evento cadastrodo no db => select * from events;
        return view('welcome', ['events' => $events]);
    }

    public function create(){
        return view('events.create');
    }
}
