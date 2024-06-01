<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Obtener el nombre de usuario del usuario autenticado
        $username = Auth::user()->username;

        // Guardar la imagen en una carpeta personalizada
        $path = $request->file('imagen_perfil')->storeAs('ImagenPerfil/' . $username, $request->file('imagen_perfil')->getClientOriginalName(), 'public');

        return $path;
    }
}
