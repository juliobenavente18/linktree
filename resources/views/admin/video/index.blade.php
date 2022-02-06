@extends('adminlte::page')

@section('title', 'Linktree')

@section('content_header')
<h1>Panel de Administración</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                
                <table id="example" class="table table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Url</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $video)
                        <tr>
                            <td>{{ $video->id }}</td>
                            <td>{{ $video->url }}</td>
                            <td><a class="btn btn-info font-weight-bolder" href="{{route('admin.video.edit', $video->id)}}">Editar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(!$videos)
                <a href="{{route('admin.video.create')}}" class="btn btn-primary">Agregar Video</a>
                @endif
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/b-2.2.2/b-html5-2.2.2/datatables.min.css" />
@stop

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/b-2.2.2/b-html5-2.2.2/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $("#example").DataTable({
            "scrollX": true,
            language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing": "Procesando...",
            },
            dom: "lfrtip",
            
            
        });
    });
</script>
<!-- <script>
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
</script> -->
@stop