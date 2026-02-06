<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Province;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\ProvinceResource;
use App\Http\Resources\DistrictResource;
use App\Http\Requests\StoreDistrictRequest;
use App\Http\Requests\UpdateDistrictRequest;

class LocationController extends Controller
{
    /**
     * Listar Departamentos
     * 
     * Obtiene la lista completa de los 24 departamentos y el Callao.
     * 
     * @group Lectura Pública
     */
    public function index()
    {
        $departments = Department::all();
        return DepartmentResource::collection($departments);
    }

    /**
     * Ver Departamento
     * 
     * Obtiene el detalle de un departamento específico por su ID.
     * 
     * @group Lectura Pública
     * @urlParam id integer required El ID del departamento (Ej: 15).
     */
    public function showDepartment($id)
    {
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }

        return new DepartmentResource($department);
    }

    /**
     * Provincias de un Departamento
     * 
     * Lista todas las provincias que pertenecen al departamento indicado.
     * 
     * @group Lectura Pública
     * @urlParam id integer required El ID del departamento padre.
     */
    public function provincesByDepartment($id)
    {
        $department = Department::find($id);
        
        if (!$department) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }

        return ProvinceResource::collection($department->provinces);
    }

    /**
     * Ver Provincia
     * 
     * Muestra el detalle de una provincia específica.
     * 
     * @group Lectura Pública
     * @urlParam id integer required El ID de la provincia.
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
     * Distritos de una Provincia
     * 
     * Lista todos los distritos que pertenecen a una provincia.
     * 
     * @group Lectura Pública
     * @urlParam id integer required El ID de la provincia padre.
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
     * Ver Distrito
     * 
     * Muestra el detalle completo (coordenadas, ubigeo) de un distrito.
     * 
     * @group Lectura Pública
     * @urlParam id integer required El ID del distrito (Ubigeo).
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
     * Buscar Distritos
     * 
     * Busca distritos por coincidencia de nombre.
     * 
     * @group Lectura Pública
     * @queryParam name string required El nombre a buscar. Example: Miraflores
     */
    public function search(Request $request)
    {
        $query = $request->input('name');

        if (!$query) {
            return response()->json(['message' => 'Escribe un nombre para buscar'], 400);
        }

        $districts = District::where('name', 'LIKE', "%{$query}%")
                             ->limit(20)
                             ->get();

        return DistrictResource::collection($districts);
    }

    /**
     * Crear Distrito
     * 
     * Registra un nuevo distrito. Requiere Token de administrador.
     * 
     * @group Gestión Administrativa (Privado)
     * @authenticated
     */
    public function store(StoreDistrictRequest $request)
    {
        $district = District::create($request->validated());

        return response()->json([
            'message' => 'Distrito creado exitosamente',
            'data' => new DistrictResource($district)
        ], 201);
    }

    /**
     * Actualizar Distrito
     * 
     * Modifica los datos de un distrito existente. Requiere Token.
     * 
     * @group Gestión Administrativa (Privado)
     * @authenticated
     * @urlParam id integer required El ID del distrito a editar.
     */
    public function update(UpdateDistrictRequest $request, $id)
    {
        $district = District::find($id);

        if (!$district) {
            return response()->json(['message' => 'Distrito no encontrado'], 404);
        }

        $district->update($request->validated());

        return response()->json([
            'message' => 'Distrito actualizado correctamente',
            'data' => new DistrictResource($district)
        ], 200);
    }
    
    /**
     * Eliminar Distrito
     * 
     * Borra un distrito de la base de datos permanentemente. Requiere Token.
     * 
     * @group Gestión Administrativa (Privado)
     * @authenticated
     * @urlParam id integer required El ID del distrito a eliminar.
     */
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
}