@extends('layouts.main')

@section('title', 'HDC Events') 

@section('content')
    <img src="/img/banner.jpg" alt="" srcset="">
    <h1>{{$nome}}</h1>
    @for ($i = 0; $i < count($arr); $i++)
        <p>{{$arr[$i]}}</p>
    @endfor
    <!-- Comentario com o Blade -->
    {{-- Teste do comentatio--}}

    @foreach ($nomes as $item)
        <p>index do loop: {{$loop->index}}</p>
        <p>{{$item}}</p>
    @endforeach
@endsection
