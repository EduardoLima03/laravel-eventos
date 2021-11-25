<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;//importa o model de acesso ao bd
use App\Models\User;

class EventController extends Controller
{
    public function index(){

        //para saber se o usuario ta pequisando por algum evento
        $search = request('search');

        if($search){
            //se o usuario busca por evento.
            // é feita a consulta com os texto proculado e retorna para view
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $events = Event::all();//pega todos os evento cadastrodo no db => select * from events;
        }

        
        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){

        $event = new Event;

        //preenchendo os dados de eventos vindo na requisição
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
            // confere se tem imagem para salvar

            $requestImage = $request->image;//recupera a imagem

            $extension = $requestImage->extension();// salva a instenção da image

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . $extension); //novo nome da image

            // Salvando a imagem no servidor
            $requestImage->move(public_path('img/events'), $imageName);

            //salvando no caminha da imagem no banco
            $event->image = $imageName;
        }

        //unindo o usuario logado com o evento criado

        $user = auth()->user();
        $event->user_id = $user->id;

        //Salvando o evento
        $event->save();

        //redimesionando para uma pagina especifica
        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }

    public function show($id){
        $event = Event::findOrFail($id);

        //criado do evento, pegango seus dados
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard()
    {
        //pega o usuario altenticado
        $user = auth()->user();

        //pegando os eventos do usuario
        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento ecluido com sucesso!');
    }

    public function edit($id){

        $event = Event::findOrFail($id);


        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request){


        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
            // confere se tem imagem para salvar

            $requestImage = $request->image;//recupera a imagem

            $extension = $requestImage->extension();// salva a instenção da image

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . $extension); //novo nome da image

            // Salvando a imagem no servidor
            $requestImage->move(public_path('img/events'), $imageName);

            //salvando no caminha da imagem no banco
            $data['image'] = $imageName;
        }

        Event::findOrFail($request->id)->update($data);


        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }
}
