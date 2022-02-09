@extends('layouts.app')
@section('content')
<nav class="navbar navbar-light sticky-top bg-warning navbar-expand-xxl lx-12">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{asset('vendor/adminlte/dist/img/logo-gruva-web.png')}}" alt="" width="30" height="30" class="d-inline-block align-text-top">
            GRUVALinktree
        </a>
        <a class="hover navbar-brand d-flex" href="admin/{{Auth::user()->username}}">Regresar</a>
    </div>
</nav>
<div class="row t-center position-absolute top-50 start-50 translate-middle">
    <div class="position-absolute text-center start-50 translate-middle">

        <div class="card-title">
            <p>ENVÍANOS TU DENUNCIA SOBRE EL PERFIL</p>
        </div>


    </div>
    <div class="col-12 card">
        <div class="card-body">
            <form action="{{route('admin.email.store')}}" method="post" class="frm-enviar">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Ejm. email@correo.com">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="subcject">Asunto</label>
                            <input type="text" id="subcject" name="subcject" class="form-control" value="Denuncia al perfil" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="userlink">Selecciona el usuario a denunciar</label>

                            <select name="userlink" id="userlink" class="form-select">
                                @foreach($users as $user)
                                <option value="{{$user->username}}">{{$user->username}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="message">Déjanos un comentario</label>
                            <textarea cols="30" type="text" id="message" name="message" class="form-control" value="Coméntanos tu denunca..." onlyread></textarea>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @csrf
                        <button type="submit" class="mt-2 btn btn-primary boton">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .hover:hover {
        background-color: rgb(221 231 65 / 90%);
        border-radius: 20%;
    }

    .hover {
        transition: background-color .5s;
        border: solid;
        border-radius: 20%;
        padding: 3px;
    }

    @media screen and (min-width: 1920px) and (max-width: 3080px) {
        p {
            margin-top: -80px;
            font-size: 40px;
            font-weight: 700;
        }
    }

    @media screen and (min-width: 674px) and (max-width: 1820px) {
        p {
            margin-top: -50px;
            font-size: 20px;
            font-weight: 700;
        }
    }

    @media screen and (min-width: 340px) and (max-width: 674px) {
        p {
            margin-top: -60px;
            font-size: 15px;
            font-weight: 700;
        }
    }
</style>
<script>
    $(document).ready(function() {
        $(".frm-enviar").submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Completar denuncia?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Agregar'
            }).then((result) => {
                if (result.value) {

                    Swal.fire(
                        '!Listo!',
                        'Denuncia enviada.',
                        'success'
                    )
                    this.submit();
                }
            })
        });
    });
</script>



@endsection