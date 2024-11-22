<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Servicio;

class ServicioFactory extends Factory
{
    /**
     * El modelo correspondiente a esta factory.
     *
     * @var string
     */
    protected $model = Servicio::class;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
     public function definition(): array
    {
        return [
            'servicio' => $this->faker->unique()->randomElement([
                'Corte de cabello',
                'Afeitado',
                'Tintura de cabello',
                'Peinado',
                'Mascarilla facial',
                'Tratamiento capilar',
            ]),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Servicio $servicio) {
            // Crea un archivo asociado al servicio
            \App\Models\Archivo::factory()->create([
                'servicio_id' => $servicio->id,
            ]);
        });
    }
    
}