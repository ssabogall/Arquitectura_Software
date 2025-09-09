<?php

namespace App\Services;

use App\Models\Pilot;
use Illuminate\Database\Eloquent\Collection;

/**
 * Servicio que maneja la lógica de negocio relacionada con pilotos
 * Separa las consultas y operaciones complejas del controlador
 * Siguiendo el principio de Single Responsibility
 */
class PilotService
{
    /**
     * Obtiene todos los pilotos ordenados por nivel de nitro de forma ascendente
     * Implementa la regla de negocio: ordenamiento por nitro (menor primero)
     * 
     * @return Collection Colección de pilotos ordenados
     */
    public function getAllPilotsOrderedByNitro(): Collection
    {
        return Pilot::orderByNitro('asc')->get();
    }

    /**
     * Crea un nuevo piloto con los datos validados
     * 
     * @param array $data Datos del piloto ya validados
     * @return Pilot Instancia del piloto creado
     */
    public function createPilot(array $data): Pilot
    {
        return Pilot::create($data);
    }

    /**
     * Obtiene estadísticas agregadas de pilotos
     * Calcula cantidad por ciudad y promedio de nitro
     * 
     * @return array Estadísticas con formato: ['city_stats' => [...], 'average_nitro' => float]
     */
    public function getPilotStatistics(): array
    {
        // Consulta agregada para contar pilotos por ciudad
        $cityStats = Pilot::selectRaw('origin_city, COUNT(*) as count')
            ->groupBy('origin_city')
            ->pluck('count', 'origin_city')
            ->toArray();

        // Calcular promedio de nivel de nitro
        $averageNitro = Pilot::avg('nitro_level');

        return [
            'city_stats' => $cityStats,
            'average_nitro' => round($averageNitro, 2)
        ];
    }

    /**
     * Obtiene pilotos filtrados por ciudad específica
     * 
     * @param string $city Ciudad a filtrar ('LA' o 'Tokio')
     * @return Collection Pilotos de la ciudad especificada
     */
    public function getPilotsByCity(string $city): Collection
    {
        return Pilot::fromCity($city)->orderByNitro('asc')->get();
    }
}
