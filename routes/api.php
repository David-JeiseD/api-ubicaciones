<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LocationController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;


Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Credenciales incorrectas'], 401);
    }

    // Nombramos al token 'saas-key'
    $token = $user->createToken('saas-key')->plainTextToken;

    return response()->json([
        'message' => 'Autenticado exitosamente',
        'token' => $token, // GUARDA ESTE TOKEN, es tu llave maestra
        'token_type' => 'Bearer'
    ]);
});


Route::get('/dame-mi-token', function () {
    // 1. Buscamos al usuario que creamos con Tinker
    $user = \App\Models\User::where('email', 'admin@saas.com')->first();
    
    // 2. Si no existe, error
    if (!$user) return 'El usuario no existe. Crea uno con Tinker primero.';

    // 3. Le creamos un token nuevo
    $token = $user->createToken('token-de-prueba')->plainTextToken;

    // 4. Te lo mostramos en pantalla
    return [
        'tu_token_secreto' => $token
    ];
});
Route::middleware('auth:sanctum')->group(function () {
    // Departamentos
    Route::get('/departments', [LocationController::class, 'index']);
    Route::get('/departments/{id}', [LocationController::class, 'showDepartment']);

    // Provincias
    Route::get('/departments/{id}/provinces', [LocationController::class, 'provincesByDepartment']);
    Route::get('/provinces/{id}', [LocationController::class, 'showProvince']);

    // Distritos
    Route::get('/provinces/{id}/districts', [LocationController::class, 'districtsByProvince']);
    Route::get('/districts/{id}', [LocationController::class, 'showDistrict']);

    // Buscador
    Route::get('/search', [LocationController::class, 'search']);
});