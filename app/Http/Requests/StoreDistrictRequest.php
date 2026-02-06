<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDistrictRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esto.
     * Como ya usamos Sanctum en la ruta, aquí ponemos true.
     */
    public function authorize(): bool
    {
        return true; // <--- IMPORTANTE: Cambiar de false a true
    }

    /**
     * Reglas de validación
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            // El ubigeo debe ser único en la tabla districts
            'ubigeo' => 'required|string|size:6|unique:districts,ubigeo',
            'province_id' => 'required|exists:provinces,id',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'altitude_masl' => 'nullable|integer',
            'surface_km2' => 'nullable|numeric',
        ];
    }
    
    // Opcional: Mensajes personalizados
    public function messages()
    {
        return [
            'ubigeo.unique' => 'Este código de Ubigeo ya está registrado.',
            'province_id.exists' => 'La provincia seleccionada no existe.'
        ];
    }
    
    public function bodyParameters()
    {
        return [
            'name' => [
                'description' => 'El nombre oficial del distrito.',
                'example' => 'Miraflores',
            ],
            'ubigeo' => [
                'description' => 'El código único de 6 dígitos (INEI/RENIEC). Debe ser único.',
                'example' => '150122',
            ],
            'province_id' => [
                'description' => 'El ID de la provincia a la que pertenece.',
                'example' => 120,
            ],
            'latitude' => [
                'description' => 'Coordenada geográfica (Latitud).',
                'example' => -12.111062,
            ],
            'longitude' => [
                'description' => 'Coordenada geográfica (Longitud).',
                'example' => -77.031591,
            ],
            'altitude_masl' => [
                'description' => 'Altitud en metros sobre el nivel del mar.',
                'example' => 79,
            ],
            'surface_km2' => [
                'description' => 'Superficie total en kilómetros cuadrados.',
                'example' => 9.62,
            ],
        ];
    }
}