<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$citas = Cita::all();
        $citas = Cita::with('servicios')
            ->with('user:id,name,email')
            ->get();
        return view('citas.index-cita', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los servicios
        $servicios = Servicio::all();

        // Pasar los servicios a la vista
        return view('citas.create-cita', compact('servicios')); // Aquí ya está corregido
    }

    public function store(Request $request)
{
    // Validar datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'fecha' => 'required|date',
        'hora' => 'required',
        'servicios' => 'required|array|min:1', // Añadir validación de mínimo uno seleccionado
        'servicios.*' => 'integer|exists:servicios,id', // Validar que los servicios sean enteros válidos
        'comentario' => 'nullable|string',
    ], [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.string' => 'El nombre debe ser un texto.',
        'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',
        'fecha.required' => 'El campo fecha es obligatorio.',
        'fecha.date' => 'El valor proporcionado no es una fecha válida.',
        'servicios.required' => 'Debe seleccionar al menos un servicio.',
        'servicios.min' => 'Debe seleccionar al menos un servicio.',
        'servicios.*.exists' => 'Uno o más servicios seleccionados no son válidos.',
    ]);

    // Verificar si ya existe una cita en la misma fecha y hora
    $citaExistente = Cita::where('fecha', $request->fecha)
                          ->where('hora', $request->hora)
                          ->first();

    if ($citaExistente) {
        return redirect()->back()->withErrors(['error' => 'Ya existe una cita para esa fecha y hora.'])->withInput();
    }

    // Crear una nueva cita asociada al usuario autenticado
    $cita = Auth::user()->citas()->create([
        'nombre' => $request->nombre,
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'comentario' => $request->comentario
    ]);

    // Asociar los servicios seleccionados con la cita
    $cita->servicios()->sync($request->servicios);

    // Redirigir a la vista de citas con un mensaje de éxito
    return redirect()->route('cita.index')->with('success', 'Cita creada exitosamente.');
}
  
    public function show(Cita $cita)
    {
        return view('citas.show-cita', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        $servicios = Servicio::all();
        return view('citas.edit-cita', compact('cita', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        // Validar datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required',
            'servicios' => 'required|array|min:1', // Añadir validación de mínimo uno seleccionado
            'servicios.*' => 'integer|exists:servicios,id', // Validar que los servicios sean enteros válidos
            'comentario' => 'nullable|string|max:500',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto.',
            'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',
            'fecha.required' => 'El campo fecha es obligatorio.',
            'fecha.date' => 'El valor proporcionado no es una fecha válida.',
            'servicios.required' => 'Debe seleccionar al menos un servicio.',
            'servicios.min' => 'Debe seleccionar al menos un servicio.',
            'servicios.*.exists' => 'Uno o más servicios seleccionados no son válidos.',
        ]);

        // Verificar si ya existe una cita en la misma fecha y hora, excluyendo la cita que se está editando
        $existeCita = Cita::where('fecha', $request->fecha)
                          ->where('hora', $request->hora)
                          ->where('id', '!=', $cita->id) // Excluir la cita que se está editando
                          ->exists();

        if ($existeCita) {
            return redirect()->back()->withErrors(['error' => 'Ya existe una cita agendada para esta fecha y hora.'])->withInput();
        }

        // Actualizar los datos de la cita
        $cita->update($request->except('servicios'));

        // Actualizar la relación con los servicios seleccionados
        $cita->servicios()->sync($request->servicios);

        return redirect()->route('cita.index')->with('success', 'Cita actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();

        return redirect()->route('cita.index')->with('success', 'Cita eliminada con éxito.');
    }
}
