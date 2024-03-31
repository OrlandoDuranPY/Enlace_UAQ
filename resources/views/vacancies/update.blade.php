@extends('layouts.enlace')
@section('titulo')
    Enlace | Actualizar vacante
@endsection
@section('contenido')
    <x-main-title>Actualizar Vacante</x-main-title>
    <livewire:update-vacancy :vacancy="$vacancy"/>
@endsection
