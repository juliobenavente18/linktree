@extends('adminlte::page')

@section('title', 'Linktree')


@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">
            <h1>LISTA DE USUARIOS</h1>
            <br>
            <table id="example" class="table display table-striped" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre de Usuario</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td><a class="btn btn-info font-weight-bolder" href="{{route ('admin.users_linktree.edit', $user)}}">Editar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

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