<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDistrictRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // <--- No olvidar poner true
    }

    public function rules(): array
    {
        // Obtenemos el ID del distrito desde la URL (la ruta es /districts/{id})
        $districtId = $this->route('id'); 

        return [
            'name' => 'sometimes|required|string|max:100',
            // unique:tabla,columna,ID_A_IGNORAR
            'ubigeo' => 'sometimes|required|string|size:6|unique:districts,ubigeo,' . $districtId,
            'province_id' => 'sometimes|required|exists:provinces,id',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
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