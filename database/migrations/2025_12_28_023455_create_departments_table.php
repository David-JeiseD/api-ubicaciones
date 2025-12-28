<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {

            $table->id();
            $table->string('name', 100); // Ej: Ayacucho
            $table->string('ubigeo', 2)->unique(); // Ej: 05 (Código de 2 dígitos)
            
            // Campos nuevos útiles
            $table->string('iso_code', 10)->nullable(); // Ej: PE-AYA (Estándar internacional)
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->integer('population')->nullable(); // Población aprox.
            $table->decimal('surface_km2', 10, 2)->nullable(); // Superficie en km²
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
