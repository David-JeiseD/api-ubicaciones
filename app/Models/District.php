<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name', 'ubigeo', 'province_id', 'postal_code', 
        'latitude', 'longitude', 'altitude_masl', 'surface_km2'
    ];
    
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
