<!-- Header -->
@extends('layouts.app')

@section('content')

<!-- Contenido principal -->
<div class="container mx-auto mt-8 px-6">
    <!-- Mapa del mundo provisional -->
    <div class="bg-blue-200 rounded-lg p-8 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Mapa del Mundo</h2>
        <div class="w-full h-96 bg-gray-300 flex justify-center items-center rounded-lg">
            <p class="text-gray-600">Mapa del mundo aquí</p>
        </div>
    </div>

    <!-- Bloques Publicaciones -->
    <div class="container pt-5 d-flex justify-content-center">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <!-- Imagen Publicacion -->
                        @if($post->imagen_post)
                            <div class="overflow-hidden" style="height: 300px;"> <!-- Aumentar la altura a 300px -->
                                <img src="{{ asset('storage/' . $post->imagen_post) }}" alt="Imagen del post" class="card-img-top" style="height: 100%; width: 100%; object-fit: cover;">
                            </div>
                        @endif
                        <!-- Informacion Publicacion -->
                        <div class="card-body d-flex flex-column">
                            <!-- Información Usuario -->
                            <div class="d-flex align-items-center mb-2">
                                <!-- Imagen de Perfil -->
                                <div class="rounded-circle overflow-hidden" style="width: 48px; height: 48px;">
                                    <img src="{{ asset('storage/' . Auth::user()->imagen_perfil) }}" alt="Imagen Perfil" class="img-fluid">
                                </div>
                                <!-- Nombre Usuario -->
                                <p class="mb-0 ml-3 text-dark font-weight-bold">{{ '@' . Auth::user()->username }}</p>
                            </div>
                            <!-- Ubicacion Publicacion -->
                            <p class="text-muted small mb-1">{{ $post->pais }}, {{ $post->ciudad }}</p>
                            <!-- Descripcion Publicacion -->
                            <p class="text-dark">{{ $post->descripcion_post }}</p>
                            <!-- Fecha Publicacion -->
                            <p class="text-muted small mt-auto">{{ $post->fecha_publicacion }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>



@endsection


