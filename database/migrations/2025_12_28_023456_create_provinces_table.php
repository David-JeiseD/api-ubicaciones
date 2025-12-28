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
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('ubigeo', 4)->unique(); // Ej: 0501 (4 dígitos)
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            
            // Campos nuevos útiles
            $table->string('capital', 100)->nullable(); // Ciudad capital (Ej: Huamanga)
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->integer('population')->nullable();
            $table->decimal('surface_km2', 10, 2)->nullable(); 
            $table->integer('altitude_masl')->nullable(); // Altitud (metros sobre el nivel del mar)
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
