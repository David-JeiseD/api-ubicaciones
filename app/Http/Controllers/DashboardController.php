<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Obtenemos los tokens activos del usuario
        $tokens = $request->user()->tokens;

        return view('dashboard', [
            'tokens' => $tokens
        ]);
    }

    public function generateToken(Request $request)
    {
        $user = $request->user();

        // 1. ELIMINA O COMENTA ESTA LÍNEA:
        // $user->tokens()->delete();  <-- ¡Adiós a esto!

        // 2. Crear nuevo token
        // Le pondremos un nombre genérico por ahora, o podrías pedirlo en el form
        $token = $user->createToken('saas-key')->plainTextToken;

        return back()->with('flash_token', $token);
    }
    
    public function deleteToken(Request $request, $id)
    {
        // Buscamos el token dentro de los tokens del usuario logueado
        // (Esto asegura que no borres el token de otro usuario por error)
        $request->user()->tokens()->where('id', $id)->delete();

        return back()->with('status', 'Token eliminado correctamente.');
    }
}