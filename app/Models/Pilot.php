<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Modelo que representa un piloto de carreras callejeras
 * Maneja la información básica: nombre, ciudad de origen y nivel de nitro
 */
class Pilot extends Model
{
    /**
     * Campos que pueden ser asignados masivamente
     * Excluye 'id' por seguridad - Laravel lo maneja automáticamente
     */
    protected $fillable = [
        'name',
        'origin_city',
        'nitro_level'
    ];
    /**
     * Casting de atributos para asegurar tipos correctos
     */
    protected $casts = [
        'nitro_level' => 'integer',
        'origin_city' => 'string',
        'name' => 'string'
    ];
    /**
     * Validaciones a nivel de modelo (opcional, complementa Form Requests)
     */
    public static function rules(): array
    {
        return [
            'name' => 'required|string|max:255|min:2',
            'origin_city' => 'required|in:LA,Tokio',
            'nitro_level' => 'required|integer|min:1|max:100'
        ];
    }
    /**
     * Scope para filtrar pilotos por ciudad
     */
    public function scopeFromCity($query, string $city)
    {
        return $query->where('origin_city', $city);
    }
    /**
     * Scope para ordenar por nivel de nitro
     */
    public function scopeOrderByNitro($query, string $direction = 'asc')
    {
        return $query->orderBy('nitro_level', $direction);
    }
    /**
     * Accessor para verificar si es piloto de Tokio
     */
    public function getIsTokyoPilotAttribute(): bool
    {
        return $this->origin_city === 'Tokio';
    }
    /**
     * Accessor para verificar si es piloto de LA
     */
    public function getIsLaPilotAttribute(): bool
    {
        return $this->origin_city === 'LA';
    }
}
