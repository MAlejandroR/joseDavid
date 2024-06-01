<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;

class UserController extends Controller
{
    public function show($id)
    {
        // Obtener el usuario con el ID proporcionado
        $user = User::find($id);

        // Verificar si se encontró el usuario
        if (!$user) {
            // Si el usuario no existe, puedes manejar el error de alguna manera, por ejemplo, redireccionando a una página de error 404
            abort(404);
        }

        // Pasar los datos del usuario a la vista
        return view('profile.show', ['user' => $user]);
    }
}


