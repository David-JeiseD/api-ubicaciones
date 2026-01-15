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
}