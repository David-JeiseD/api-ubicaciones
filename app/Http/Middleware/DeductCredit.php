<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeductCredit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (!$user) return $next($request);
    
        // 1. REVISAR EXPIRACIÓN
        if ($user->plan_expires_at && $user->plan_expires_at->isPast()) {
            $user->update([
                'plan' => 'free',
                'credits' => 0,
                'plan_expires_at' => null
            ]);
            return response()->json(['message' => 'Tu plan ha expirado.'], 403);
        }
    
        // 2. REVISAR CRÉDITOS
        if ($user->credits <= 0) {
            return response()->json(['message' => 'Sin créditos suficientes.'], 402);
        }
    
        // 3. COBRAR
        $user->decrement('credits');
    
        $response = $next($request);
        $response->headers->set('X-Credits-Remaining', $user->fresh()->credits);
        return $response;
    }

}
