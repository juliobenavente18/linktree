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
                
                <form action="{{route('admin.links.update', $link->id)}}" method="post">
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre del Link</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="My YouTube Channel" value="{{ $link->name }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Link URL</label>
                                <input type="text" id="link" name="link" class="form-control" placeholder="https://youtube.com/user/aschmelyun" value="{{ $link->link }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <button type="button" class="btn btn-secondary" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete Link</button>
                        </div>
                    </div>
                </form>
                <form id="delete-form" method="post" action="{{route('admin.links.destroy', $link->id)}}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop