<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        // Elimina esta línea
        // $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'imagen_perfil' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'descripcion' => ['nullable', 'string', 'max:260'],
        ]);
    }

    protected function create(array $data)
    {
        // Crear el usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            //'imagen_perfil' => $path,
            'descripcion' => $data['descripcion'],
        ]);

        // Manejar la subida de la imagen de perfil después de que el usuario se haya creado
        if (request()->hasFile('imagen_perfil')) {
            $file = request()->file('imagen_perfil');
            // Obtener el ID del usuario recién creado
            $userId = $user->id;
            // Crear la ruta de almacenamiento con el ID del usuario
            $path = $file->storeAs('ImagenPerfil/' . $userId, $file->getClientOriginalName(), 'public');
            // Actualizar el campo 'imagen_perfil' en el usuario recién creado
            $user->update(['imagen_perfil' => $path]);
        }

        return $user;
    }




}
