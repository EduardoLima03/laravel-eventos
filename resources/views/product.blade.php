@extends('layouts.main')

@section('title', 'Produto')   

@section('content')
<h1>Produto</h1>
    @if ($id != null)
        <p>Produto escolhido: {{$id}}</p>
    @endif
@endsection