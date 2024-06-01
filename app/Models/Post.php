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
    ];
}
