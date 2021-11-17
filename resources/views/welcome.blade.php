@extends('layouts.main')

@section('title', 'HDC Events') 

@section('content')

<div class="col-md-12" id="search-container">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar ...">
    </form>
</div>
<div class="col-md-12" id="events-container">
    @if ($search)
        <h2>Buscando por: {{$search}}</h2>
    @else
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    
    <div id="cards-container" class="row">
        @foreach ($events as $item)
            <div class="card col-md-3">
                <img src="/img/events/{{$item->image}}" alt="{{$item->title}}">
                <div class="card-body">
                    <p class="card-date">{{date('d/m/Y', strtotime($item->date))}}</p>
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-praticipants">X Participantes</p>
                    <a href="/events/{{$item->id}}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach
        @if (count($events)==0 && $search)
            <p>Não foi possível encontrat nenhum evento {{$search}}! <a href="/">Ver todos!</a></p>
        @elseif(count($events)==0)
            <p>Não há eventos disponíveis</p>
        @endif
    </div>
</div>

@endsection
