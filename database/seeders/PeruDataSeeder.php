<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Department;
use App\Models\Province;
use App\Models\District;

class PeruDataSeeder extends Seeder
{
    public function run()
    {
        $repoUrl = 'https://raw.githubusercontent.com/jmcastagnetto/ubigeo-peru-aumentado/main';
        
        $this->command->info('⏳ Descargando datos...');
        
        // Descargamos
        $deps = Http::get("$repoUrl/ubigeo_departamento.json")->json();
        $provs = Http::get("$repoUrl/ubigeo_provincia.json")->json();
        $dists = Http::get("$repoUrl/ubigeo_distrito.json")->json();

        // Validamos que la descarga haya traído listas y no un error de API
        if (!is_array($deps) || !is_array($provs) || !is_array($dists)) {
            $this->command->error('❌ Error descargando los datos. Puede ser bloqueo de GitHub. Espera unos minutos.');
            return;
        }

        DB::beginTransaction();

        try {
            // 1. DEPARTAMENTOS
            foreach ($deps as $dep) {
                if (!isset($dep['reniec'])) continue; // Saltamos si no hay ID

                $ubigeo2Digitos = substr($dep['reniec'], 0, 2); 
                
                $poblacion = null;
                if (isset($dep['poblacion']) && is_numeric($dep['poblacion'])) {
                    $poblacion = $dep['poblacion'];
                } elseif (isset($dep['superficie']) && isset($dep['pob_densidad_2020']) && is_numeric($dep['superficie']) && is_numeric($dep['pob_densidad_2020'])) {
                    $poblacion = round($dep['superficie'] * $dep['pob_densidad_2020']);
                }

                Department::updateOrCreate(
                    ['id' => intval($ubigeo2Digitos)], // Buscamos por ID
                    [
                        'name'          => $dep['departamento'],
                        'ubigeo'        => $ubigeo2Digitos, 
                        'iso_code'      => $dep['iso_3166_2'] ?? null,
                        'latitude'      => $dep['latitude'] ?? null,
                        'longitude'     => $dep['longitude'] ?? null,
                        'surface_km2'   => (is_numeric($dep['superficie'] ?? null)) ? $dep['superficie'] : null,
                        'population'    => $poblacion, 
                    ]
                );
            }
            $this->command->info('✅ Departamentos procesados.');

            // 2. PROVINCIAS
            foreach ($provs as $prov) {
                if (!isset($prov['reniec'])) continue;

                $ubigeo4Digitos = substr($prov['reniec'], 0, 4);
                $deptId = intval(substr($prov['reniec'], 0, 2));
                
                $altitud = $prov['altitude'] ?? $prov['altitud'] ?? null;
                if (!is_numeric($altitud)) $altitud = null;

                $superficie = $prov['superficie'] ?? null;
                if (!is_numeric($superficie)) $superficie = null;

                Province::updateOrCreate(
                    ['id' => intval($ubigeo4Digitos)],
                    [
                        'department_id' => $deptId,
                        'name'          => $prov['provincia'],
                        'ubigeo'        => $ubigeo4Digitos,
                        'capital'       => $prov['capital'] ?? null,
                        'latitude'      => $prov['latitude'] ?? null,
                        'longitude'     => $prov['longitude'] ?? null,
                        'altitude_masl' => $altitud,
                        'surface_km2'   => $superficie,
                        'population'    => (isset($prov['poblacion']) && is_numeric($prov['poblacion'])) ? $prov['poblacion'] : null, 
                    ]
                );
            }
            $this->command->info('✅ Provincias procesadas.');

            // 3. DISTRITOS
            foreach ($dists as $dist) {
                // AQUÍ ESTABA EL ERROR: Validamos que exista la clave 'reniec' antes de usarla
                if (!isset($dist['reniec'])) continue;
                
                if($dist['reniec'] == '000000' || substr($dist['reniec'], 4, 2) === '00') continue;

                $provId = intval(substr($dist['reniec'], 0, 4));
                
                // Validaciones numéricas (El fix anterior)
                $superficie = $dist['superficie'] ?? null;
                if (!is_numeric($superficie)) $superficie = null;

                $altitud = $dist['altitude'] ?? $dist['altitud'] ?? null;
                if (!is_numeric($altitud)) $altitud = null;

                District::updateOrCreate(
                    ['id' => intval($dist['reniec'])],
                    [
                        'province_id'   => $provId,
                        'name'          => $dist['distrito'],
                        'ubigeo'        => $dist['reniec'], 
                        'latitude'      => $dist['latitude'] ?? null,
                        'longitude'     => $dist['longitude'] ?? null,
                        'altitude_masl' => $altitud,
                        'surface_km2'   => $superficie,
                        'postal_code'   => null,
                    ]
                );
            }
            $this->command->info('✅ Distritos procesados.');

            DB::commit();
            $this->command->info('🎉 ¡Base de datos poblada con éxito!');
            
        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->error('❌ Error: ' . $e->getMessage() . ' en la línea ' . $e->getLine());
        }
    }
}