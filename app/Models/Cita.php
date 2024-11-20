<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    // Los atributos que se pueden asignar en masa
    protected $fillable = ['user_id','nombre', 'fecha', 'hora', 'comentario'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Definir la relación con el modelo Servicio a través de la tabla pivot 'servicios_cita'
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'servicios_cita');
    }
}
