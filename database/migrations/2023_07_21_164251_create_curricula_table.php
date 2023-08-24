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
        Schema::create('curricula', function (Blueprint $table) {
            $table->id();
                        /* ========================================
            Datos Personales
            ========================================= */
            $table->string('name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->text('about_me');
            /* ========================================
            Datos Academicos
            ========================================= */
            $table->foreignId('study_programs_id')->nullable();
            $table->integer('semester')->nullable();
            $table->json('academic_achievements');
            $table->foreignId('academic_programs_id')->nullable();
            $table->json('study_level')->nullable();
            $table->string('degree')->nullable();
            /* ========================================
            Datos Experiencia
            ========================================= */
            $table->json('experience');
            $table->json('projects');
            /* ========================================
            Datos Referencias y Tipo de Usuario
            ========================================= */
            $table->json('references');
            $table->integer('type'); // Estudiante:1 / Egresado:2 /Docente:3
            /* ========================================
            Activo o Desactivo
            ========================================= */
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curricula');
    }
};
