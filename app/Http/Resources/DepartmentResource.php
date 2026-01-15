<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
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
            'codigo_iso'    => $this->iso_code,
            'estadisticas'  => [
                'poblacion'      => $this->population,
                'superficie_km2' => $this->surface_km2,
            ],
            'mapa'          => [
                'latitud'  => $this->latitude,
                'longitud' => $this->longitude,
            ],
            // Nota: Ocultamos created_at y updated_at al no incluirlos aquí
        ];
    }
}
