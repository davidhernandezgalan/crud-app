<?php

namespace App\Http\Controllers;
use App\Mail\ServicioNuevo;
use App\Models\Archivo;
use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Mail;

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
            'servicio' => 'required|string|max:255|unique:servicios,servicio',
        ], [
            'servicio.required' => 'Debes ingresar un servicio.',
            'servicio.unique' => 'El servicio ingresado ya existe.',
        ]);
    
        // Crear el servicio sin incluir la columna 'imagen'
        $servicio = Servicio::create([
            'servicio' => $validated['servicio'],
        ]);
    
        // Verificar y manejar los archivos
        if ($request->hasFile('archivo') && $request->file('archivo')->isValid()) {
            $ruta = $request->archivo->store('mis-archivos', 'public');
    
            $archivo = new Archivo([
                'nombre_original' => $request->archivo->getClientOriginalName(),
                'ruta' => $ruta,
            ]);
    
            $servicio->archivos()->save($archivo);
        }
    
        // Verificar y manejar las imágenes
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $path = $request->file('imagen')->store('imagenes_servicios', 'public');
    
            $imagen = new Archivo([
                'nombre_original' => $request->file('imagen')->getClientOriginalName(),
                'ruta' => $path,
            ]);
    
            $servicio->archivos()->save($imagen);
        }
        // Obtener todos los correos de los suscriptores
        $suscriptores = User::pluck('email');
        foreach ($suscriptores as $suscriptor) {
            Mail::to($suscriptor)->send(new ServicioNuevo($servicio));
        }
    
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
    // Validación de los campos
    $request->validate([
        'servicio' => 'required|string|max:255',
        'archivo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Actualizamos el nombre del servicio
    $servicio->servicio = $request->input('servicio');
    $servicio->save(); // Guardamos el nombre del servicio

    // Si se ha subido un nuevo archivo
    if ($request->hasFile('archivo')) {
        // Eliminar el archivo anterior si existe
        if ($servicio->archivos->isNotEmpty()) {
            $archivoAnterior = $servicio->archivos->first();
            // Eliminar archivo físico si existe
            Storage::delete('public/' . $archivoAnterior->ruta);
            // Eliminar el registro de archivo de la base de datos
            $archivoAnterior->delete();
        }

        // Subir el nuevo archivo
        $ruta = $request->file('archivo')->store('servicios', 'public');
        $archivo = new Archivo([
            'nombre_original' => $request->file('archivo')->getClientOriginalName(),
            'ruta' => $ruta,
        ]);
        $servicio->archivos()->save($archivo); // Guardar el nuevo archivo asociado al servicio
    }

    return redirect()->route('servicio.index')->with('success', 'Servicio actualizado con éxito.');
}

    public function descargar(Archivo $archivo)
    {
        // Verificar si el archivo existe
        if (Storage::disk('public')->exists($archivo->ruta)) {
            // Devolver el archivo para su descarga
            return response()->download(storage_path('app/public/' . $archivo->ruta), $archivo->nombre_original);
        }
    
        // Si el archivo no existe, redirigir con mensaje de error
        return redirect()->back()->with('error', 'El archivo no existe.');
    }

    
}
