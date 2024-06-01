<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JourneySnap') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Incluir Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body>
    <div id="app">
    <!-- Header -->
        <nav class="navbar navbar-expand-md navbar-light shadow-sm headerprincipal">
            <div class="container">
                <!-- Logo  -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'JourneySnap') }}
                </a>

                <!-- Bloque Derecha -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                            <!-- Bloque: Imagen Perfil + Usuario -->
                            <li class="nav-item dropdown flex items-center">
                                <!-- Enlace a la página de perfil -->
                                <a href="{{ route('profile.index') }}" class="nav-link" role="button" aria-haspopup="true" aria-expanded="false">
                                    <!-- Imagen Perfil -->
                                    <!-- Imagen redonda de fondo rojo -->
                                    <div class="rounded-full h-16 w-16 bg-white flex-shrink-0">
                                        <img src="{{ asset('storage/' . Auth::user()->imagen_perfil) }}" alt="Imagen Perfil" class="rounded-full h-full w-full object-cover" />
                                    </div>    
                                </a>

                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ '@' . Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                <div>
            </div>
    
        </nav>
    <!-- End Header -->

        <main class="py-4">
            @yield('content')
        </main>

        
    </div>
</body>
</html>
