@extends('adminlte::page')
@include('components.helpButton')
@section('title', 'Editar')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Usuario</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                            @foreach ($errors->all() as $error)
                                <span class="badge badge-danger">{{ $error }}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="d-flex justify-content-center mb-4">
                        @if ($user->profile_photo_path)
                            <img src="{{ asset($user->profile_photo_path) }}" class="img-fluid rounded border mb-3"
                                alt="Foto de perfil" style="max-width: 200px; height: auto;">
                        @else
                            <img src="{{ asset('assets/images/user.png') }}" class="img-fluid rounded border mb-3"
                                alt="Foto de perfil" style="max-width: 200px; height: auto;">
                        @endif
                    </div>


                    <form class="forms-sample" method="POST" action="{{ route('users.update', $user->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $user->name }}" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirm-password"
                                placeholder="Confirmar Contraseña">
                        </div>
                        <div class="form-group">
                            <label for="profile_photo">Imagen de Perfil</label>
                            <input type="file" class="form-control-file" id="profile_photo" name="profile_photo"
                                accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                        <a href="{{ route('users.index') }}" class="btn btn-light">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
