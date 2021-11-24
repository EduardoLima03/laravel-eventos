@extends('layouts.main')
@section('title', 'Desboard')
@section('content')
    
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Eventos</h1>
    </div>
    <div class="com-md-10 offset-md-1 dashboard-events-container">
        @if (count(events > 0))
            
        @else
            <p>Você ainda não tem ventos, <a href="/events/create">criar eventos!</a></p>
        @endif
    </div>


@endsection