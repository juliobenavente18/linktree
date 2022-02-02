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

                <form action="/admin/settings" method="post">
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