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
                <form action="{{route('admin.video.store')}}" method="post">
                    <div class="row">
                        
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="url">Url del video</label>
                                <p>Recuerda que la url debe estar escrita tal y como se muestra en el ejemplo.</p>
                                <input type="text" id="url" name="url" class="form-control" placeholder="Ejm. https://youtube.com/embed/aschmelyun">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <button type="submit" class="btn btn-primary">Guardar Video</button>
                        </div>
                    </div>
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