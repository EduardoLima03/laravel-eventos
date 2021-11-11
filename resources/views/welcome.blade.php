<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="/css/styles.css">

        <script src="/js/scripts.js"></script>
       
    </head>
    <body >
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
    </body>
</html>
