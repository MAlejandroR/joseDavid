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
            <label for="pais">País</label>
            <select id="pais" name="pais" class="form-control" onchange="loadCities(this.value)">
                <option value="">Selecciona un país</option>
                <!-- Opciones cargadas dinámicamente -->
            </select>
        </div>
        <div>
            <label for="ciudad">Ciudad</label>
            <select id="ciudad" name="ciudad" class="form-control">
                <option value="">Selecciona una ciudad</option>
                <!-- Opciones cargadas dinámicamente -->
            </select>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                const countrySelect = document.getElementById('pais');
                data.sort((a, b) => a.name.common.localeCompare(b.name.common));
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.cca2; // Código del país en formato ISO 3166-1 alpha-2
                    option.textContent = country.name.common;
                    countrySelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching countries:', error));
    });

    function loadCities(countryCode) {
        const citySelect = document.getElementById('ciudad');
        citySelect.innerHTML = '<option value="">Selecciona una ciudad</option>';

        if (!countryCode) return;

        const username = 'josedavidfc'; // Tu nombre de usuario de Geonames

        fetch(`http://api.geonames.org/searchJSON?country=${countryCode}&featureClass=P&maxRows=1000&username=${username}`)
            .then(response => response.json())
            .then(data => {
                data.geonames.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.name;
                    option.textContent = city.name;
                    citySelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching cities:', error));
    }
</script>

@endsection
