<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Comentamos esta línea para que los usuarios no necesiten estar autenticados para acceder a la página de inicio
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        // Retornar la vista con los datos del usuario
        $posts = Post::all(); // O la lógica que uses para obtener los posts del perfil

        return view('home', compact('posts'));

    }
}
