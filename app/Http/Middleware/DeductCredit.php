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

        // 1. Si no hay usuario (es público), lo dejamos pasar gratis 
        // (o lo bloqueamos, tú decides. Asumamos que rutas privadas requieren pago).
        if (!$user) {
            return $next($request);
        }

        // 2. Si es 'Super Admin' o 'Premium Ilimitado', no le cobramos (Opcional)
        // if ($user->plan === 'unlimited') return $next($request);

        // 3. Revisar si tiene saldo
        if ($user->credits <= 0) {
            return response()->json([
                'message' => 'Saldo agotado. Por favor recarga tu plan.',
                'current_credits' => 0
            ], 402); // 402 = Payment Required
        }

        // 4. COBRAR (Restar 1 crédito)
        $user->decrement('credits');

        // 5. Agregar una cabecera para avisarle cuánto le queda (Buena UX)
        $response = $next($request);
        $response->headers->set('X-Credits-Remaining', $user->fresh()->credits);

        return $response;
    }
}
