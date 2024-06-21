@extends('layouts.app')

@section('content')

<!-- Contenido principal -->
<div class="container mx-auto mt-8 px-6">
    <!-- Mapa del mundo Open Street Map | Leaflet -->
    <div class="bg-black rounded-lg p-8 mb-8">
        <h2 class="text-2xl font-semibold mb-4 text-white">Sumérgete en tu siguiente escapada</h2>
        <div class="w-full h-96 bg-gray-300 flex justify-center items-center rounded-lg">
            <div id="mi_mapa" class="w-full h-96"></div>

            <!-- API MAPS -->
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-o8Qv+udvtw3FZzI6EYtykAuw6u2wNryj5qBc1Qzt1lg=" crossorigin=""/>
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var map = L.map('mi_mapa').setView([20, 0], 2);

                    /* Estamos colocando la capa del mapa */
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                });
            </script>
        </div>
    </div>

    <!-- Bloques Publicaciones -->
    <div class="container pt-5">
        <div class="row justify-content-center">
            @foreach($posts as $post)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <!-- Imagen Publicacion -->
                        @if($post->imagen_post)
                            <div class="overflow-hidden" style="height: 300px;">
                                <img src="{{ asset('storage/' . $post->imagen_post) }}" alt="Imagen del post" class="card-img-top" style="height: 100%; width: 100%; object-fit: contain;">
                            </div>
                        @endif
                        <!-- Informacion Publicacion -->
                        <div class="card-body d-flex flex-column">
                            <!-- Información Usuario -->
                            <div class="d-flex align-items-center mb-2">
                                <!-- Imagen de Perfil -->
                                @if(Auth::user()->imagen_perfil)
                                    <div class="rounded-circle overflow-hidden" style="width: 48px; height: 48px;">
                                        <img src="{{ asset('storage/' . Auth::user()->imagen_perfil) }}" alt="Imagen Perfil" class="img-fluid">
                                    </div>
                                @endif
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
