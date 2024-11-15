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
        $servicios = Servicio::all(); // Obtener todos los servicios
        return view('servicios.index-servicio', compact('servicios')); // Retornar vista con los servicios
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create-servicio'); // Mostrar formulario para crear un servicio
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar el campo 'servicio' para que sea único
        $validated = $request->validate([
            'servicio' => 'required|string|max:255|unique:servicios,servicio', // Regla de unicidad
        ], 
        [
            'servicio.required' => 'Debes ingresar un servicio.',
            'servicio.unique' => 'El servicio ingresado ya existe.',
        ]);

        // Crear un nuevo registro en la base de datos
        Servicio::create([
            'servicio' => $validated['servicio'],
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('servicio.index')->with('success', 'Servicio agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        return view('servicios.show-servicio', compact('servicio')); // Mostrar detalles del servicio
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        return view('servicios.edit-servicio', compact('servicio')); // Mostrar formulario para editar un servicio
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        // Validar el campo 'servicio' para que sea único en la base de datos, excluyendo el servicio actual
        $validatedData = $request->validate([
            'servicio' => 'required|string|max:255|unique:servicios,servicio,' . $servicio->id, // Validación de unicidad
        ], [
            'servicio.required' => 'Debes ingresar un servicio.',
            'servicio.unique' => 'El servicio ingresado ya existe.',
        ]);

        // Actualizar el servicio
        $servicio->update([
            'servicio' => $validatedData['servicio'],
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('servicio.index')->with('success', 'Servicio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        $servicio->delete(); // Eliminar el servicio

        // Redirigir con mensaje de éxito
        return redirect()->route('servicio.index')->with('success', 'Servicio eliminado correctamente');
    }
}
