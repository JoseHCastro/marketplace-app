@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Usuario</h1>
@stop

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="forms-sample" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="profile_photo">Imagen de Perfil</label>
                        <input type="file" class="form-control-file" id="profile_photo" name="profile_photo" accept="image/*">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password"
                            placeholder="Confirmar Contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                    <a href="{{ route('users.index') }}" class="btn btn-light">Cancelar</a>
                </form>


            </div>
        </div>
    </div>

@stop
