@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
    @if ($busca != '')
        <p>Tipo de produto procurado: {{$busca}}</p>
    @endif
@endsection