<!-- Header -->
@extends('layouts.app')

@section('content')

<div class="container">

    <a href="{{ route('posts.create') }}">Crear Post</a>

    <!-- Bloques Publicacion -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($posts as $post)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Imagen Publicacion -->
                @if($post->imagen_post)
                    <img src="{{ asset('storage/' . $post->imagen_post) }}" alt="Imagen del post" class="w-full h-56 object-cover">
                @endif
                <!-- Informacion Publicacion -->
                <div class="p-4">
                    <!-- Información Usuario -->
                    <div class="flex items-center mb-2">
                        <!-- Imagen de Perfil -->
                        <div class="rounded-full h-12 w-12 bg-white flex-shrink-0">
                            <img src="{{ asset('storage/' . Auth::user()->imagen_perfil) }}" alt="Imagen Perfil" class="rounded-full h-full w-full object-cover" />
                        </div>
                        <!-- Nombre Usuario -->
                        <p class="text-gray-800 font-semibold text-sm">{{ '@' . Auth::user()->username }}</p>
                    </div>
                    <!-- Ubicacion Publicacion -->
                    <p class="text-gray-600 text-xs mb-1">{{ $post->pais }}, {{ $post->ciudad }}</p>
                    <!-- Descripcion Publicacion -->
                    <p class="text-gray-800 text-sm">{{ $post->descripcion_post }}</p>
                    <!-- Fecha Publicacion -->
                    <p class="text-gray-600 text-xs">{{ $post->fecha_publicacion }}</p>
                </div>
            </div>
        @endforeach
    </div>
    

</div>

@endsection