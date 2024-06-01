<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
URL::forceScheme('http');

//Ruta para la pagina de Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta para la pagina de inicio de sesión
Route::get('/', function () {return view('auth/login');});

//Rutas para Incio y Registro de Sesión
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Rutas para User_Contoller
// Para proteger tus rutas para que solo los usuarios autenticados puedan acceder a la página de perfil.
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');


// Rutas para post/publicaciones
Route::get('/posts', [PostController::class, 'index'])->name('post.index')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create')->middleware('auth');

// Define todas las rutas para el recurso 'posts' con middleware 'auth'
Route::resource('posts', PostController::class)->middleware('auth');









Auth::routes();

