@extends('layouts.main')

@section('title', 'HDC Events') 

@section('content')

<div class="col-md-12" id="search-container">
    <h1>Busque um evento</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar ...">
    </form>
</div>
<div class="col-md-12" id="events-container">
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    <div id="cards-container" class="row">
        @foreach ($events as $item)
            <div class="card col-md-3">
                <img src="/img/event_placeholder.jpg" alt="{{$item->title}}">
                <div class="card-body">
                    <p class="card-date">10/11/2021</p>
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-praticipants">X Participantes</p>
                    <a href="#" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
