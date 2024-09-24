<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    // Los atributos que se pueden asignar en masa
    protected $fillable = [
        'nombre', 
        'fecha', 
        'hora', 
        'servicio', 
        'comentario'
    ];

    // Los atributos que deberían ser ocultados para los arreglos
    // protected $hidden = [];

    // Los atributos que deberían ser casted a un tipo específico
    // protected $casts = [];
}