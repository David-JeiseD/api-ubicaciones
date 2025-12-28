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
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('ubigeo', 6)->unique(); // Ej: 050101 (6 dígitos)
            $table->foreignId('province_id')->constrained()->onDelete('cascade');
            
            // Campos nuevos de alta utilidad
            $table->string('postal_code', 10)->nullable(); // Ej: 05001
            $table->decimal('latitude', 10, 8)->nullable(); // Para mapas
            $table->decimal('longitude', 11, 8)->nullable(); // Para mapas
            $table->integer('altitude_masl')->nullable(); // Altitud específica del distrito
            $table->decimal('surface_km2', 10, 2)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
