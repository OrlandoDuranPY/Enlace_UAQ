@extends('layouts.enlace')
@section('titulo')
    Enlace | Actualizar docente
@endsection
@section('contenido')
    <x-main-title>Actualizar Docente</x-main-title>
    <livewire:update-teacher-curriculum :curriculum="$curriculum"/>
@endsection