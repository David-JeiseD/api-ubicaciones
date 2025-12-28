<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'name', 'ubigeo', 'department_id', 'capital', 'latitude', 'longitude',
        'population', 'surface_km2', 'altitude_masl'
    ];
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Una provincia tiene muchos distritos
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
