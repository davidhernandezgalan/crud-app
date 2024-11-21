<?php

namespace Tests\Feature;

use App\Models\Cita;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CitaControllerTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function listado_de_citas_muestra_texto_determinado_y_codigo_200()
    {
        $user = User::factory()->create();
        $citas = Cita::factory()->count(3)->create(['user_id' => $user->id]);
        $ultimaCita = $citas->last();

        $response = $this->actingAs($user)->get(route('cita.index'));

        $response->assertStatus(200)
                 ->assertSee('Citas')
                 ->assertSee($ultimaCita->nombre);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function creacion_de_cita_agrega_registro_y_redirige_correctamente()
    {
        $user = User::factory()->create();
        $servicios = Servicio::factory()->count(3)->create();

        $citaData = [
            'nombre' => 'Juan Pérez',
            'fecha' => '2024-12-01',
            'hora' => '10:00',
            'servicios' => $servicios->pluck('id')->toArray(),
            'comentario' => 'Primera cita',
        ];

        $response = $this->actingAs($user)->post(route('cita.store'), $citaData);

        $response->assertRedirect(route('cita.index'));
        $this->assertDatabaseHas('citas', [
            'nombre' => 'Juan Pérez',
            'fecha' => '2024-12-01',
            'hora' => '10:00',
            'comentario' => 'Primera cita',
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function creacion_de_cita_con_datos_invalidos_genera_errores_de_validacion()
    {
        $user = User::factory()->create();

        $citaData = [
            'nombre' => '',
            'fecha' => '',
            'hora' => '',
            'servicios' => [],
        ];

        $response = $this->actingAs($user)->post(route('cita.store'), $citaData);

        $response->assertSessionHasErrors([
            'nombre',
            'fecha',
            'hora',
            'servicios',
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function eliminacion_de_cita_borra_registro_y_redirige_correctamente()
{
    $user = User::factory()->create();
    $cita = Cita::factory()->create(['user_id' => $user->id]);
    $servicio = Servicio::factory()->create();

    // Asociar cita con un servicio
    $cita->servicios()->attach($servicio);

    // Verificar que la cita y la relación existen
    $this->assertDatabaseHas('citas', ['id' => $cita->id]);
    $this->assertDatabaseHas('servicios_cita', [
        'cita_id' => $cita->id,
        'servicio_id' => $servicio->id,
    ]);

    // Eliminar la cita
    $response = $this->actingAs($user)->delete(route('cita.destroy', $cita->id)); // Pasar el ID

    // Verificar redirección
    $response->assertRedirect(route('cita.index'));

    // Verificar que la cita y la relación han sido eliminadas
    $this->assertDatabaseMissing('citas', ['id' => $cita->id]);
    $this->assertDatabaseMissing('servicios_cita', [
        'cita_id' => $cita->id,
        'servicio_id' => $servicio->id,
    ]);
}
}
