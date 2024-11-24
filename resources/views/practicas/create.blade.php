create
@extends('layouts.main')
@section('title', 'EFSRT - Prácticas')
@section('section-title', 'Registrar Práctica')
<form action="{{ route('practicas.store') }}" method="post">
    @csrf
    @section('section-buttons')
        <div class="btn-group me-2">
            <a href="{{ route('practicas.index') }}" class="btn btn-danger">
            Regresar
            </a>
            <button type="submit" class="btn btn-primary mx-1">
                Guardar
            </button>
        </div>
    @endsection
    @section('content')
    <div class="form-group">
        <label for="">Estudiante</label>
        <input type="text" name="user_id" class="form-control mt-2" placeholder="">

        <label for="">Docente Supervisor </label>
        <input type="text" name="docente" class="form-control mt-2" placeholder="">

        <label for="">Empresa</label>
        <input type="text" name="empresa" class="form-control mt-2" placeholder="">

        <label for="">Módulo</label>
        <input type="text" name="modulo_id" class="form-control mt-2" placeholder="">

        <label for="">Fecha_Inicio</label>
        <input type="date" name="fecha_inicio" class="form-control mt-2" placeholder="">

        <label for="">Fecha_Fin</label>
        <input type="date" name="fecha_fin" class="form-control mt-2" placeholder="">

        <label for="">Terminado</label>
        <input type="text" name="terminado" class="form-control mt-2" placeholder="">
        
    </div>
</form>
@endsection