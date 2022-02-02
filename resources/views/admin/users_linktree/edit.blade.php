@extends('layouts.app')


@section('content')
@if(session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="container">
    <h1>ASIGNAR ROL</h1>
    <br>
    <div class="card-body">
        <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{$user->username}}" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}" readonly>
        </div>

        <form action="{{route('admin.users_linktree.update', $user)}}" method="post">
            @csrf
            @method('PUT')
            <h2 class="title">Asignar Rol</h2>
            @foreach ($roles as $rol)
            <div class="form-check mt-3 mb-3">
                <input class="form-check-input" type="checkbox" name="roles[]" value="{{$rol->id}}">
                <label class="form-check-label" for="role1">
                    {{$rol['name']}}
                </label>
            </div>
            @endforeach


            <a href="{{route('admin.users_linktree.index')}}" class="btn btn-danger" tabindex="5">Cancelar</a>

            <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>


        </form>
    </div>

</div>
@endsection