@extends('adminlte::page')

@section('title', 'Linktree')

@section('content_header')
<h1>Panel de Administración</h1>
@stop

@section('content')
<p>Bienvenido 
@can('admin.users.edit')    
<b><a target="_blank" href="/{{Auth::user()->username}}">{{Auth::user()->username}}</a>
</b>@endcan al Panel de Administración de Linktree.</p>
@if ($video)
    @can('admin.video.index')
        <div class="muestra">
            <iframe class="videomuestra" src="http://www.youtube.com/embed/{{$urlvideo}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    @endcan
@endif
@can('admin.links.create')
<a href="{{route('admin.links.create')}}" class="btn btn-primary font-weight-bold mt-2">Agregar Links</a>
@endcan
@can('admin.users.edit')
<a target="_blank" href="/{{Auth::user()->username}}" class="btn btn-warning font-weight-bold mt-2">Ver Linktree</a>
@endcan
@stop



@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/b-2.2.2/b-html5-2.2.2/datatables.min.css" />
<style>
    @media screen and (min-width: 768px) and (max-width: 1920px) {
        .videomuestra {
            width: 80%;
            height: 600px;

        }

        .muestra {
            display: block;
            text-align: center;
        }
    }

    @media screen and (min-width: 365px) and (max-width: 768px) {
        .videomuestra {
            width: 100%;
            height: 190px;

        }

        .muestra {
            display: block;
            text-align: center;
        }
    }
</style>
@stop

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/b-2.2.2/b-html5-2.2.2/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "scrollX": true
        });
    });
    define(['pace'], function(pace) {
        pace.start({
            document: false
        });
    });
</script>
@stop