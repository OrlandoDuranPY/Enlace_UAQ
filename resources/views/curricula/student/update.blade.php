@extends('layouts.enlace')
@section('titulo')
    Enlace | Actualizar estudiante
@endsection
@section('contenido')
    <x-main-title>Actualizar Estudiante</x-main-title>
    <livewire:update-student-curriculum :curriculum="$curriculum"/>
@endsection