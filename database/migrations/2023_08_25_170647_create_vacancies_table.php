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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            /* ========================================
            Datos de la empresa
            ========================================= */
            $table->string('company');
            $table->string('location');
            // Datos de la vacante
            $table->string('job_title');
            $table->string('salary');
            $table->string('schedule');
            $table->text('description');
            $table->text('observations');
            /* ========================================
            Datos de contacto
            ========================================= */
            $table->string('email');
            $table->string('phone');
            // $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
