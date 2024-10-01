<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = ['servicios', 'comentario'];

    // Cast para que los servicios se manejen como array
    protected $casts = [
        'servicios' => 'array',
    ];
}
