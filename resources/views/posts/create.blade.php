<!-- Header -->
@extends('layouts.app')

@section('content')

<div class="container">

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="imagen_post">Imagen:</label>
            <input type="file" name="imagen_post" id="imagen_post" required>
        </div>
        <div>
            <label for="pais">País:</label>
            <input type="text" name="pais" id="pais" required>
        </div>
        <div>
            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" id="ciudad" required>
        </div>
        <div>
            <label for="descripcion_post">Descripción:</label>
            <textarea name="descripcion_post" id="descripcion_post"></textarea>
        </div>
        <div>
            <label for="fecha_publicacion">Fecha de Publicación:</label>
            <input type="date" name="fecha_publicacion" id="fecha_publicacion" required>
        </div>
        <button type="submit">Crear</button>
    </form>
</div>

@endsection
