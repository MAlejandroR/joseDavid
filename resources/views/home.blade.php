<!-- Header -->
@extends('layouts.app')

@section('content')

<!-- Contenido principal -->
<div class="container mx-auto mt-8 px-6">
    <!-- Mapa del mundo Open Street Map | Leaflet -->
    <div class="bg-blue-200 rounded-lg p-8 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Mapa del Mundo</h2>
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

    <!-- Mapa del mundo Leaflet.Glify -->
    <div class="bg-blue-200 rounded-lg p-8 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Mapa del Mundo</h2>
        <div class="w-full h-96 bg-gray-300 flex justify-center items-center rounded-lg">
            <div id="mi_mapa" class="w-full h-96"></div>

            <!-- API MAPS -->
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-o8Qv+udvtw3FZzI6EYtykAuw6u2wNryj5qBc1Qzt1lg=" crossorigin=""/>
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
            <script src="https://unpkg.com/leaflet.glify@0.5.0/dist/leaflet.glify.min.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var map = L.map('mi_mapa').setView([20, 0], 2);

                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    // Ejemplo de capa 3D utilizando Leaflet.Glify
                    L.glify.shapes({
                        map: map,
                        data: 'https://unpkg.com/@geo-maps/countries-land-1m/countries-land-1m.geojson',
                        color: () => [0.2, 0.4, 0.6, 0.6],
                        opacity: 0.5,
                        size: 1,
                        clickable: true,
                        onClick: function (e, feature) {
                            alert('Has hecho clic en: ' + feature.properties.name);
                        }
                    });
                });
            </script>
        </div>
    </div>

    <!-- Mapa del mundo Mapbox GL JS -->
    <div class="bg-blue-200 rounded-lg p-8 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Mapa del Mundo</h2>
        <div class="w-full h-96 bg-gray-300 flex justify-center items-center rounded-lg">
            <div id="mi_mapa" class="w-full h-96"></div>

            <!-- API MAPS -->
            <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
            <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    mapboxgl.accessToken = 'TU_MAPBOX_ACCESS_TOKEN';

                    var map = new mapboxgl.Map({
                        container: 'mi_mapa',
                        style: 'mapbox://styles/mapbox/streets-v11',
                        center: [0, 20],
                        zoom: 1.5
                    });

                    map.on('load', function () {
                        map.addLayer({
                            'id': '3d-buildings',
                            'source': 'composite',
                            'source-layer': 'building',
                            'filter': ['==', 'extrude', 'true'],
                            'type': 'fill-extrusion',
                            'minzoom': 15,
                            'paint': {
                                'fill-extrusion-color': '#aaa',
                                'fill-extrusion-height': [
                                    "interpolate", ["linear"], ["zoom"],
                                    15, 0,
                                    15.05, ["get", "height"]
                                ],
                                'fill-extrusion-base': [
                                    "interpolate", ["linear"], ["zoom"],
                                    15, 0,
                                    15.05, ["get", "min_height"]
                                ],
                                'fill-extrusion-opacity': 0.6
                            }
                        });
                    });
                });
            </script>
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
