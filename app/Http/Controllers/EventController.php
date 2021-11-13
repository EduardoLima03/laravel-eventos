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

    public function store(Request $request){

        $event = new Event;

        //preenchendo os dados de eventos vindo na requisição
        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;

        //Salvando o evento
        $event->save();

        //redimesionando para uma pagina especifica
        return redirect('/');

    }
}
