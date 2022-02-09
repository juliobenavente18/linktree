@extends('layouts.app2')

@section('content')
    <div class="container">
        <h1 class="text-center pt-5 pb-5"
        style="color: {{ $titleColor }}; font-family: {{$fuente}}; font-size: {{$size_titulo}}"
        >{{$titulo}} </h1>
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                @foreach($user->links as $link)
                    <div class="link">
                        <a
                            data-link-id="{{ $link->id }}"
                            class="user-link d-block p-4 mb-4 rounded h3 text-center"
                            style="border: 2px solid {{ $textColor }}; color: {{ $textColor }}; font-family: {{$fuente}}; font-size: {{$size_links}};"
                            href="{{ $link->link }}"
                            target="_blank"
                            rel="nofollow"
                            
                        >{{ $link->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        a{
            transition: background-color .5s;
        }
        a:hover{
            background-color: {{$fondo_boton}};
        }
    </style>
@stop

