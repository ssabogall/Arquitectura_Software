<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * Valida los datos para crear un nuevo piloto
 * Centraliza las reglas de validación fuera del controlador
 */
class StorePilotRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|min:2',
            'origin_city' => 'required|in:LA,Tokio',
            'nitro_level' => 'required|integer|min:1|max:100'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del piloto es obligatorio',
            'name.min' => 'El nombre debe tener al menos 2 caracteres',
            'origin_city.required' => 'La ciudad de origen es obligatoria',
            'origin_city.in' => 'La ciudad debe ser LA o Tokio',
            'nitro_level.required' => 'El nivel de nitro es obligatorio',
            'nitro_level.integer' => 'El nivel de nitro debe ser un número entero',
            'nitro_level.min' => 'El nivel de nitro mínimo es 1',
            'nitro_level.max' => 'El nivel de nitro máximo es 100'
        ];
    }
}