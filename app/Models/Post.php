<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagen_post',
        'pais',
        'ciudad',
        'descripcion_post',
        'fecha_publicacion',
        'user_id', // Añadir user_id a los fillable
    ];

    // Definir la relación con el usuario que creó el post
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
