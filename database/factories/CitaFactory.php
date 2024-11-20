<?php
/*
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cita;
use App\Models\User;

class CitaFactory extends Factory
{
    /**
     * El modelo correspondiente a esta factory.
     *
     * @var string
     
    protected $model = Cita::class;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Generar un usuario relacionado
            'nombre' => $this->faker->name, // Nombre aleatorio
            'fecha' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'), // Fecha dentro del próximo mes
            'hora' => $this->faker->time('H:i:s'), // Hora aleatoria
            'comentario' => $this->faker->optional()->sentence, // Comentario opcional
        ];
    }
}
*/
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cita;
use App\Models\User;

class CitaFactory extends Factory
{
    /**
     * El modelo correspondiente a esta factory.
     *
     * @var string
     */
    protected $model = Cita::class;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Horarios disponibles en el formulario
        $horasDisponibles = [
            '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', 
            '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', 
            '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00'
        ];

        return [
            'user_id' => User::factory(), // Generar un usuario relacionado
            'nombre' => $this->faker->name, // Nombre aleatorio
            'fecha' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'), // Fecha dentro del próximo mes
            'hora' => $this->faker->randomElement($horasDisponibles), // Seleccionar una hora válida
            'comentario' => $this->faker->optional()->sentence, // Comentario opcional
        ];
    }
}