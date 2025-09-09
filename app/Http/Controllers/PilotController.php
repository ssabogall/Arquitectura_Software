<?php

namespace App\Http\Controllers;

use App\Services\PilotService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Controlador que maneja las operaciones HTTP relacionadas con pilotos
 * Solo orquesta las peticiones, delegando lógica de negocio al servicio
 * Sigue el principio de responsabilidad única
 */
class PilotController extends Controller
{
    /**
     * Servicio de pilotos inyectado por dependency injection
     */
    private PilotService $pilotService;

    /**
     * Constructor con inyección de dependencias
     * Laravel automáticamente resuelve la dependencia
     */
    public function __construct(PilotService $pilotService)
    {
        $this->pilotService = $pilotService;
    }

    /**
     * Muestra la lista de todos los pilotos ordenados por nivel de nitro
     * Implementa las reglas de presentación del negocio
     *
     * @return View Vista con la lista de pilotos
     */
    public function index(): View
    {
        // Obtener pilotos ordenados mediante el servicio
        $pilots = $this->pilotService->getAllPilotsOrderedByNitro();

        return view('pilots.index', compact('pilots'));
    }

    /**
     * Muestra el formulario para crear un nuevo piloto
     *
     * @return View Vista del formulario de creación
     */
    public function create(): View
    {
        return view('pilots.create');
    }

    /**
     * Almacena un nuevo piloto en la base de datos
     * Valida datos y delega creación al servicio
     *
     * @param  Request  $request  Petición HTTP con datos del piloto
     * @return RedirectResponse Redirección con mensaje de éxito o error
     */
    public function store(Request $request): RedirectResponse
    {
        // Validaciones directas en el controlador (decisión técnica justificada)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|min:2',
            'origin_city' => 'required|in:LA,Tokio',
            'nitro_level' => 'required|integer|min:1|max:100',
        ], [
            'name.required' => 'El nombre del piloto es obligatorio',
            'name.min' => 'El nombre debe tener al menos 2 caracteres',
            'origin_city.required' => 'La ciudad de origen es obligatoria',
            'origin_city.in' => 'La ciudad debe ser LA o Tokio',
            'nitro_level.required' => 'El nivel de nitro es obligatorio',
            'nitro_level.integer' => 'El nivel de nitro debe ser un número entero',
            'nitro_level.min' => 'El nivel de nitro mínimo es 1',
            'nitro_level.max' => 'El nivel de nitro máximo es 100',
        ]);

        // Crear piloto usando el servicio
        $this->pilotService->createPilot($validatedData);

        return redirect()->route('pilots.index')
            ->with('success', 'Piloto registrado exitosamente');
    }

    /**
     * Muestra las estadísticas de pilotos
     *
     * @return View Vista con estadísticas agregadas
     */
    public function statistics(): View
    {
        $statistics = $this->pilotService->getPilotStatistics();

        return view('pilots.statistics', compact('statistics'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
