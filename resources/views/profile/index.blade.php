@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <h1 class="m-0 text-dark">Perfil de Usuario</h1>
@stop

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if ($user->profile_photo_path)
                            <img src="{{ asset($user->profile_photo_path) }}" class="img-fluid rounded border mb-3" alt="Foto de perfil" style="max-width: 200px; height: auto;">
                        @else
                            <img src="{{ asset('assets/images/user.png') }}" class="img-fluid rounded border mb-3" alt="Foto de perfil" style="max-width: 200px; height: auto;">
                        @endif
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <p>{{ $user->name }}</p>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <p>{{ $user->email }}</p>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <p>********</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-secondary" href="{{ route('profiles.edit', $user->id) }}">Editar</a>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@stop
