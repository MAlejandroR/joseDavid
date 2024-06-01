<!-- resources/views/profile/show.blade.php -->

<!-- Header -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Perfil de {{ $user->username }}
                </div>
                <!-- Botón para ir a la página de edición del perfil -->
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar Perfil</a>
                <div class="card-body">
                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" value="{{ $user->username }}" readonly>
                    </div>
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" value="{{ $user->email }}" readonly>
                    </div>
                    <!-- Fecha Nacimiento -->
                    <div class="form-group">
                        <label for="birthdate">Fecha de Nacimiento:</label>
                        <input type="text" class="form-control" id="birthdate" value="{{ $user->fecha_nacimiento }}" readonly>
                    </div>
                    <!-- Descripcion -->
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea class="form-control" id="description" rows="3" readonly>{{ $user->descripcion }}</textarea>
                    </div>
                    <!-- Imagen Perfil -->
                    <div class="form-group">
                        <label for="imagen_perfil">Imagen de Perfil:</label>
                        <br>
                        <img src="{{ asset('storage/' . $user->imagen_perfil) }}" alt="Imagen Perfil" class="img-thumbnail" width="150">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

