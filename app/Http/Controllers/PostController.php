<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{

    // Validar la solicitud manualmente
    $validator = Validator::make($request->all(), [
        'imagen_post' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:5120', // Ajustar el tamaño máximo a 5 MB (5120 KB)
        'pais' => 'required|string|max:255',
        'ciudad' => 'required|string|max:255',
        'descripcion_post' => 'required|string|max:255',
        'fecha_publicacion' => 'required|date',
    ]);

    // Comprobar si la validación falla
    if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    }

    
    $nuevoPost = new Post();

    // Recuperar el archivo subido
    $archivo = $request->file('imagen_post');

    // Generar un hash del contenido del archivo
    //$hashArchivo = md5_file($archivo->getRealPath());

    // Crear la ruta personalizada para guardar la imagen
    $userId = $request->user()->id; // Asumiendo que el usuario está autenticado y tiene un ID
    $username = $request->user()->username; // Asumiendo que el usuario autenticado tiene un nombre de usuario
    $nombreOriginal = $archivo->getClientOriginalName(); // Obtener el nombre original del archivo

    // Crear la ruta con el id del usuario y el nombre del usuario
    $rutaDirectorio = 'ImagenesPost/' . $userId . '_' . $username;

    // Guardar el archivo en la ruta especificada y mantener el nombre original
    $rutaArchivo = $archivo->storeAs($rutaDirectorio, $nombreOriginal, 'public');

    // Inspeccionar el hash y la ruta del archivo guardado
    //dd(['hash' => $hashArchivo, 'ruta' => $rutaArchivo]);

    $nuevoPost->imagen_post = $rutaArchivo; // Asumiendo que tienes una columna llamada 'imagen_post' en tu tabla 'posts'
    $nuevoPost->pais = $request->pais;
    $nuevoPost->ciudad = $request->ciudad;
    $nuevoPost->descripcion_post = $request->descripcion_post;
    $nuevoPost->fecha_publicacion = $request->fecha_publicacion;

    // Puedes guardar la ruta del archivo y el hash en la base de datos si es necesario
    //$nuevoPost->imagen_post = $hashArchivo; // Asumiendo que tienes una columna llamada 'imagen_post' en tu tabla 'posts'

    $nuevoPost->save();

    return redirect()->back()->with('success', 'Post creado correctamente');
}

}
