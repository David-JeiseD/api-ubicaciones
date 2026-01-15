<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DistrictResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'nombre'        => $this->name,
            'codigo_ubigeo' => $this->ubigeo,
            'provincia_id'  => $this->province_id, // Referencia al papá
            'codigo_postal' => $this->postal_code, // Campo útil
            'estadisticas'  => [
                'superficie_km2' => $this->surface_km2,
                'altitud_msnm'   => $this->altitude_masl,
            ],
            'mapa'          => [
                'latitud'  => $this->latitude,
                'longitud' => $this->longitude,
            ],
        ];
    }
}
