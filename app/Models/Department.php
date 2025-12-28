<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'ubigeo', 'iso_code', 'latitude', 'longitude', // <--- Agregados
        'population', 'surface_km2'
    ];

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}
