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
}