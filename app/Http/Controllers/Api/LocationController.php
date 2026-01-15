<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Province;
use App\Models\District;
use Illuminate\Http\Request;
// Importamos los 3 Resources que creamos
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\ProvinceResource;
use App\Http\Resources\DistrictResource;
//formrequest
use App\Http\Requests\StoreDistrictRequest;
use App\Http\Requests\UpdateDistrictRequest;

class LocationController extends Controller
{
    /**
     * 1. Listar todos los departamentos
     * URL: GET /api/departments
     */
    public function index()
    {
        $departments = Department::all();
        
        // Usamos 'collection' porque es una lista de muchos departamentos
        return DepartmentResource::collection($departments);
    }

    /**
     * 2. Ver detalle de un solo departamento
     * URL: GET /api/departments/{id}
     */
    public function showDepartment($id)
    {
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }

        // Usamos 'new' porque es un solo objeto
        return new DepartmentResource($department);
    }

    /**
     * 3. Listar provincias de un departamento específico
     * URL: GET /api/departments/{id}/provinces
     */
    public function provincesByDepartment($id)
    {
        $department = Department::find($id);
        
        if (!$department) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }

        // Accedemos a la relación ->provinces y la transformamos
        return ProvinceResource::collection($department->provinces);
    }

    /**
     * 4. Ver detalle de una sola provincia (Nuevo método útil)
     * URL: GET /api/provinces/{id}
     */
    public function showProvince($id)
    {
        $province = Province::find($id);

        if (!$province) {
            return response()->json(['message' => 'Provincia no encontrada'], 404);
        }

        return new ProvinceResource($province);
    }
    
    /**
     * 5. Listar distritos de una provincia específica
     * URL: GET /api/provinces/{id}/districts
     */
    public function districtsByProvince($id)
    {
        $province = Province::find($id);
        
        if (!$province) {
            return response()->json(['message' => 'Provincia no encontrada'], 404);
        }

        return DistrictResource::collection($province->districts);
    }

    /**
     * 6. Ver detalle de un solo distrito (Nuevo método útil)
     * URL: GET /api/districts/{id}
     */
    public function showDistrict($id)
    {
        $district = District::find($id);

        if (!$district) {
            return response()->json(['message' => 'Distrito no encontrado'], 404);
        }

        return new DistrictResource($district);
    }

    /**
     * 7. Buscador de distritos
     * URL: GET /api/search?name=Miraflores
     */
    public function search(Request $request)
    {
        $query = $request->input('name');

        if (!$query) {
            return response()->json(['message' => 'Escribe un nombre para buscar'], 400);
        }

        // Buscamos los distritos
        $districts = District::where('name', 'LIKE', "%{$query}%")
                             ->limit(20) // Limitamos a 20 para no saturar
                             ->get();

        // Incluso en la búsqueda devolvemos los datos con el formato bonito
        return DistrictResource::collection($districts);
    }

    public function update(UpdateDistrictRequest $request, $id)
    {
        $district = District::find($id);

        if (!$district) {
            return response()->json(['message' => 'Distrito no encontrado'], 404);
        }

        // Actualizamos con los datos ya validados y limpios
        $district->update($request->validated());

        return response()->json([
            'message' => 'Distrito actualizado correctamente',
            'data' => new DistrictResource($district)
        ], 200);
    }
    
    public function destroy($id)
    {
        $district = District::find($id);

        if (!$district) {
            return response()->json(['message' => 'Distrito no encontrado'], 404);
        }

        $district->delete();

        return response()->json([
            'message' => 'Distrito eliminado correctamente'
        ], 200);
    }

    public function store(StoreDistrictRequest $request)
    {
        // ¡Magia! Si el código llega aquí, es que YA pasó la validación.
        // Laravel lo validó automáticamente antes de entrar al método.
        
        // $request->validated() devuelve solo los campos que pasaron las reglas (seguridad extra)
        $district = District::create($request->validated());

        return response()->json([
            'message' => 'Distrito creado exitosamente',
            'data' => new DistrictResource($district)
        ], 201);
    }
}