<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::all();
        return view('citas.index-cita', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('citas.create-cita');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'fecha' => 'required|date',
        'hora' => 'required',
        'servicio' => 'required|string',
        'comentario' => 'nullable|string'
    ]);

    // Verificar si ya existe una cita en la misma fecha y hora
    $citaExistente = Cita::where('fecha', $request->fecha)
                          ->where('hora', $request->hora)
                          ->first();

    if ($citaExistente) {
        // Redirigir de nuevo con un mensaje de error y los datos ingresados previamente
        return redirect()->back()->withErrors(['error' => 'Ya existe una cita para esa fecha y hora.'])->withInput();
    }

    // Crear una nueva cita
    $cita = new Cita();
    $cita->nombre = $request->nombre;
    $cita->fecha = $request->fecha;
    $cita->hora = $request->hora;
    $cita->servicio = $request->servicio;
    $cita->comentario = $request->comentario;
    $cita->save();

    // Redirigir con mensaje de éxito
    return redirect()->route('cita.index')->with('success', 'Cita creada exitosamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        return view('citas.show-cita', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        return view('citas.edit-cita', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        $request->validate([
            'nombre' => ['required', 'max:255'],
            'fecha' => ['required', 'date'],
            'hora' => ['required'],
            'servicio' => ['required'],
            'comentario' => ['nullable', 'max:500'],
        ]);

        $existeCita = Cita::where('fecha', $request->fecha)
        ->where('hora', $request->hora)
        ->where('id', '!=', $cita->id) // Excluir la cita que se está editando
        ->exists();

    if ($existeCita) {
        return redirect()->back()->withErrors(['error' => 'Ya existe una cita agendada para esta fecha y hora.'])->withInput();
    }

    // Actualizar la cita
    $cita->update($request->all());

    return redirect()->route('cita.index')->with('success', 'Cita actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();

        return redirect()->route('cita.index');
    }
}
