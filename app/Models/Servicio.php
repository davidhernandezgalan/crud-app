<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['servicio'];
    public function archivos()
    {
        return $this->hasMany(Archivo::class, 'servicio_id');
    }
}

