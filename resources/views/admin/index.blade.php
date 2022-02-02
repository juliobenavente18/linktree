@extends('adminlte::page')

@section('title', 'Linktree')

@section('content_header')
<h1>Panel de Administración</h1>
@stop

@section('content')
<p>Bienvenido <b><a target="_blank" href="admin/{{Auth::user()->username}}">{{Auth::user()->username}}</a></b> al Panel de Administración de Linktree.</p>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/b-2.2.2/b-html5-2.2.2/datatables.min.css" />

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