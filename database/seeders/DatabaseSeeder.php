<?php
/*
namespace Database\Seeders;

use App\Models\Servicio;
use App\Models\Cita;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();

        User::factory()
            ->withPersonalTeam()
            ->has(Cita::factory()->count(5))
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
    }
}
*/
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cita;
use App\Models\Servicio;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Siembra la base de datos.
     */
    public function run(): void
    {
        // Crear usuarios
        $usuarios = User::factory(10)->create(); // 10 usuarios de ejemplo

        // Crear servicios
        $servicios = Servicio::factory(6)->create(); // 6 servicios disponibles

        // Crear citas asociadas a usuarios y servicios
        $usuarios->each(function ($usuario) use ($servicios) {
            // Para cada usuario, crea entre 1 y 5 citas
            Cita::factory(rand(1, 5))
                ->for($usuario) // Asocia la cita con el usuario
                ->create() // Crea la cita
                ->each(function ($cita) use ($servicios) {
                    // Asocia entre 1 y 3 servicios aleatorios a cada cita
                    $cita->servicios()->sync($servicios->random(rand(1, 3))->pluck('id')->toArray());
                });
        });

        $this->command->info('Base de datos poblada con usuarios, servicios y citas de ejemplo.');
    }
}