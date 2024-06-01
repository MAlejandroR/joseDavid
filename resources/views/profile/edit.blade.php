@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Perfil</h1>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Username -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="{{ $user->username }}" class="form-control">
            </div>

            <!-- Nombre -->
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="form-group">
                <label for="birthdate">Fecha de Nacimiento:</label>
                <input type="date" name="birthdate" id="birthdate" value="{{ $user->fecha_nacimiento }}" class="form-control">
            </div>

            <!-- Descripcion -->
            <div class="form-group">
                <label for="description">Descripcion:</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ $user->descripcion }}</textarea>
            </div>

            <!-- Imagen de Perfil -->
            <div class="form-group">
                <label for="imagen_perfil">Imagen de Perfil:</label>
                <br>
                @if($user->imagen_perfil)
                    <img src="{{ asset('storage/' . $user->imagen_perfil) }}" alt="Imagen Perfil" class="img-thumbnail" width="150">
                @endif
                <input type="file" name="imagen_perfil" id="imagen_perfil" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
