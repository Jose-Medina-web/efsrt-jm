@extends('layouts.main')
@section('title', 'EFSRT - Prácticas')
@section('section-title', 'Lista de Prácticas')
@section('section-buttons')
    <div class="btn-group me-2">
        <a href="{{ route('practicas.create') }}" class="btn btn-success">
            Nuevo Registro
        </a>
    </div>
@endsection