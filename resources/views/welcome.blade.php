@extends('layouts.main')

@section('title', 'HDC Events') 

@section('content')
   @foreach ($events as $item)
       <p>{{$item->title}} -- {{$item->description}}</p>
   @endforeach
@endsection
