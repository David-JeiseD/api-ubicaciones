<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProvinceResource extends JsonResource
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
            'departamento_id' => $this->department_id, // Referencia al papá
            'capital'       => $this->capital,         // Dato importante de provincias
            'estadisticas'  => [
                'poblacion'      => $this->population,
                'superficie_km2' => $this->surface_km2,
                'altitud_msnm'   => $this->altitude_masl, // Traducimos 'masl' a algo legible
            ],
            'mapa'          => [
                'latitud'  => $this->latitude,
                'longitud' => $this->longitude,
            ],
        ];
    }
}
