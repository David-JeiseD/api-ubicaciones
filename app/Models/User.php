<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// 1. IMPORTANTE: Agrega esta línea
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // 2. IMPORTANTE: Agrega 'HasApiTokens' dentro del use
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'plan',             // <--- AGREGAR ESTO
        'credits',          // <--- AGREGAR ESTO
        'plan_expires_at',  // <--- AGREGAR ESTO
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'plan_expires_at' => 'datetime', // Importante para que Laravel lo reconozca como fecha
    ];
    
    public function upgradePlan($planName, $credits, $months)
    {
        // Calculamos la fecha de inicio (hoy o cuando venza su plan actual)
        $start = ($this->plan_expires_at && $this->plan_expires_at->isFuture()) 
                 ? $this->plan_expires_at 
                 : now();
    
        $this->update([
            'plan' => $planName,
            'credits' => $this->credits + $credits,
            'plan_expires_at' => $start->addMonths($months),
        ]);
    }
}