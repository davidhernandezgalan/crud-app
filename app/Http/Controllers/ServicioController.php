<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index-servicio', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create-servicio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'servicios' => 'required|array', // Se asegura de que se seleccionen al menos algunos servicios
            'comentario' => 'nullable|string',
        ]);

        // Crear un nuevo registro en la base de datos
        Servicio::create([
            'servicios' => json_encode($validated['servicios']), // Almacenar como JSON
            'comentario' => $validated['comentario'],
        ]);

        // Redireccionar o enviar respuesta
        return redirect()->route('servicio.index')->with('success', 'Servicios agregados correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        // Convertir el servicio JSON a array
        $servicio->servicios = json_decode($servicio->servicios, true);
        return view('servicios.show-servicio', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        // Convertir el servicio JSON a array
        $servicio->servicios = json_decode($servicio->servicios, true);
        return view('servicios.edit-servicio', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'servicios' => 'required|array', // Asegúrate de que sea un array
            'comentario' => 'nullable|string',
        ]);

        // Actualizar los datos
        $servicio->servicios = json_encode($validatedData['servicios']); // Convertir a JSON
        $servicio->comentario = $validatedData['comentario'];

        // Guardar en la base de datos
        $servicio->save();

        // Redirigir o mostrar un mensaje de éxito
        return redirect()->route('servicio.index')->with('success', 'Servicio actualizado correctamente');
    }
/**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();

        return redirect()->route('servicio.index');
    }

}
