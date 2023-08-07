<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         /* ========================================
        Licenciaturas
        ========================================= */
        DB::table('study_programs')->insert([
            'name' => 'Ingeniería en Biotecnología',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_programs')->insert([
            'name' => 'Ingeniería en Química Ambiental',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_programs')->insert([
            'name' => 'Ingeniero Químico en Materiales',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_programs')->insert([
            'name' => 'Ingeniería en Químico de Alimentos',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_programs')->insert([
            'name' => 'Ingeniero Agroquímico',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_programs')->insert([
            'name' => 'Químico Farmacéutico Biólogo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        /* ========================================
        Especialidades
        ========================================= */
        DB::table('study_programs')->insert([
            'name' => 'Especialidad en Bioquímica Clínica',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_programs')->insert([
            'name' => 'Especialidad en Inocuidad de Alimentos',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        /* ========================================
        Maestrias
        ========================================= */
        DB::table('study_programs')->insert([
            'name' => 'Maestría en Ciencia y Tecnología de Alimentos',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_programs')->insert([
            'name' => 'Maestría en Ciencia y Tecnología Ambiental',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_programs')->insert([
            'name' => 'Maestría en Ciencias Químico Biológicas',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_programs')->insert([
            'name' => 'Maestría en Ciencias de la Energía',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_programs')->insert([
            'name' => 'Maestría en Química Clínica Diagnóstica',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        /* ========================================
        Doctorados
        ========================================= */
        DB::table('study_programs')->insert([
            'name' => 'Doctorado en Ciencias de los Alimentos',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_programs')->insert([
            'name' => 'Doctorado en Ciencias Químico Biológicas',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('study_programs')->insert([
            'name' => 'Doctorado en Ciencias de la Energía',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
