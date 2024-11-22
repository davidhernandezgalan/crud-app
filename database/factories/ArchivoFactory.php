<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Archivo;
use App\Models\Servicio;

class ArchivoFactory extends Factory
{
    /**
     * El modelo correspondiente a esta factory.
     *
     * @var string
     */
    protected $model = Archivo::class;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'servicio_id' => Servicio::factory(), // Crea un servicio automáticamente si no existe
            'ruta' => $this->faker->imageUrl('https://upload.wikimedia.org/wikipedia/commons/3/34/Barbershop_In_Iran_-_Barber%2C_Hairdresser_09.jpg'), // Ruta falsa para la imagen
        ];
    }
}
