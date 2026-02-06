<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LocationController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\DeductCredit;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

// ---------------------------------------------------------
// 1. AUTENTICACIÓN (Fábrica de Tokens)
// ---------------------------------------------------------
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
        'token' => $token,
        'token_type' => 'Bearer'
    ]);
});

// ---------------------------------------------------------
// 2. RUTAS PÚBLICAS (Lectura / GET)
// Cualquiera puede consultar el mapa sin token
// ---------------------------------------------------------

// Departamentos
//Route::get('/departments', [LocationController::class, 'index']);
Route::get('/departments/{id}', [LocationController::class, 'showDepartment']);

// Provincias
Route::get('/departments/{id}/provinces', [LocationController::class, 'provincesByDepartment']);
Route::get('/provinces/{id}', [LocationController::class, 'showProvince']);

// Distritos
Route::get('/provinces/{id}/districts', [LocationController::class, 'districtsByProvince']);
Route::get('/districts/{id}', [LocationController::class, 'showDistrict']);

// Buscador
Route::get('/search', [LocationController::class, 'search']);


// ---------------------------------------------------------
// 3. RUTAS PRIVADAS (Escritura / Admin)
// Requieren Token Bearer para entrar
// ---------------------------------------------------------
// Agregamos 'throttle:api' al array
Route::middleware(['auth:sanctum', 'throttle:api', DeductCredit::class])->group(function () {
    
    // Tus rutas...
    Route::get('/departments', [LocationController::class, 'index']); // La de prueba
    
    Route::post('/districts', [LocationController::class, 'store']);
    
    Route::put('/districts/{id}', [LocationController::class, 'update']);
    Route::delete('/districts/{id}', [LocationController::class, 'destroy']);
    
});