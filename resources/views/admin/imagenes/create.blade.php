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
                <form action="{{route('admin.imagenes.store')}}" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Cargar Imagen</label>
                                <input type="file" id="url" name="url" class="form-control{{ $errors->first('url') ? ' is-invalid' : '' }}" accept="image/*">
                                @if($errors->first('url'))
                                <div class="invalid-feedback">{{ $errors->first('url') }}</div>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <button type="submit" class="btn btn-primary">Guardar Imagen</button>

                        </div>
                        <div class="col-12 col-md-6 mt-4">
                            <img id="imagenSeleccionada" style="max-height: 300px;">
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
        $('#url').change(function(){
            
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