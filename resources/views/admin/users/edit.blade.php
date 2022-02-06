@extends('adminlte::page')

@section('title', 'Linktree')

@section('content_header')
<h1>Ajustes</h1>
@stop

@section('content')
@section('plugins.BootstrapColorpicker', true)
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <div>
                    <p class="text-info">Los cambios que realices se verán reflejados en tu página de LinkTree</p>
                </div>

                <form action="/admin/settings" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="background_color">Color de Fondo Linktree</label>

                                <x-adminlte-input-color id="background_color" autocomplete="off" class="form-control{{ $errors->first('background_color') ? ' is-invalid' : '' }}" value="{{ $user->background_color }}" name="background_color" placeholder="Seleccione color de fondo...">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-light">
                                            <i class="fas fa-lg fa-tint"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-color>


                                @if($errors->first('background_color'))
                                <div class="invalid-feedback">{{ $errors->first('background_color') }}</div>

                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="text_color">Color de Texto LinkTree</label>
                                <x-adminlte-input-color id="text_color" autocomplete="off" class="form-control{{ $errors->first('text_color') ? ' is-invalid' : '' }}" value="{{ $user->text_color }}" name="text_color" placeholder="Seleccione color de texto...">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-light">
                                            <i class="fas fa-lg fa-tint"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-color>

                                @if($errors->first('text_color'))
                                <div class="invalid-feedback">{{ $errors->first('text_color') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="title_color">Color de Titulo LinkTree</label>
                                <x-adminlte-input-color id="title_color" autocomplete="off" class="form-control{{ $errors->first('title_color') ? ' is-invalid' : '' }}" value="{{ $user->title_color }}" name="title_color" placeholder="Seleccione color de Título...">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-light">
                                            <i class="fas fa-lg fa-tint"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-color>

                                @if($errors->first('title_color'))
                                <div class="invalid-feedback">{{ $errors->first('title_color') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="titulo">Titulo LinkTree</label>
                                <input type="text" id="titulo" autocomplete="off" class="form-control{{ $errors->first('titulo') ? ' is-invalid' : '' }}" value="{{ $user->titulo }}" name="titulo" placeholder="Escriba su título...">
                                @if($errors->first('titulo'))
                                <div class="invalid-feedback">{{ $errors->first('titulo') }}</div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="imagen">Imagen de Fondo</label>
                                <input accept="image/*" type="file" id="imagen" autocomplete="off" class="form-control{{ $errors->first('imagen') ? ' is-invalid' : '' }}" value="{{ $user->imagen }}" name="imagen">
                                @if($errors->first('imagen'))
                                <div class="invalid-feedback">{{ $errors->first('imagen') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="fuente">Fuente de Letra</label>

                                <input type="text" id="fuente" autocomplete="off" class="form-control{{ $errors->first('fuente') ? ' is-invalid' : '' }}" value="{{ $user->fuente }}" name="fuente" placeholder="Escoja la fuente de letra...">
                                

                                @if($errors->first('fuente'))
                                <div class="invalid-feedback">{{ $errors->first('fuente') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="size_titulo">Tamaño de Letra del Título</label>

                                <input type="text" id="size_titulo" autocomplete="off" class="form-control{{ $errors->first('size_titulo') ? ' is-invalid' : '' }}" value="{{ $user->size_titulo }}" name="size_titulo" placeholder="Ejm. 30px">
                                

                                @if($errors->first('size_titulo'))
                                <div class="invalid-feedback">{{ $errors->first('size_titulo') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="size_links">Tamaño de Letra Links</label>

                                <input type="text" id="size_links" autocomplete="off" class="form-control{{ $errors->first('size_links') ? ' is-invalid' : '' }}" value="{{ $user->size_links }}" name="size_links" placeholder="Ejm. 30px">
                                

                                @if($errors->first('size_links'))
                                <div class="invalid-feedback">{{ $errors->first('size_links') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            @if($user->imagen)
                            <img id="imagenActual" src="{{$user->imagen}}" style="max-height:300px; max-width: 500px;" alt="">
                            @endif
                            <img id="imagenSeleccionada" style="max-height: 300px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <button type="submit" class="btn btn-primary{{ session('success') ? ' is-valid' : '' }}">Guardar Cambios</button>
                            @if(session('success'))
                            <div class="valid-feedback">{{ session('success') }}</div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
    $(document).ready(function (e){
        $('#imagen').change(function(){
            
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
            $('#imagenActual').css("display","none");
        });
    });
</script>
@endsection