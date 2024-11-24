create
@extends('layouts.main')
@section('title', 'EFSRT - Prácticas')
@section('section-title', 'Registrar Práctica')
@section('form_open')
    <form action="{{ route('practicas.store') }}" method="post">
        @csrf
    @endsection
    
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
            <div class="row">
                <div class="col-6">
                    <label class="mb-2" for="">Estudiante</label>
                    <select class="form-control" id="user_id" name="user_id">
                        <option value="">Seleccione un estudiante</option>
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}">{{ Str::upper($estudiante->lastname) }},
                                {{ Str::title($estudiante->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label for="">Docente Supervisor </label>
                    <input type="text" name="docente" class="form-control mt-2" placeholder="">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label class="mt-2" for="">Empresa</label>
                    <input type="text" name="empresa" class="form-control mt-2" placeholder="">
                </div>
                <div class="col-6">
                    <label class="mt-2" for="">Módulo</label>
                    <select name="modulo_id" id="modulo_id" class="form-control mt-2">
                        <option value="">Seleccione un módulo</option>
                        @foreach ($modulos as $modulo)
                            <option value="{{ $modulo->id }}">{{ $modulo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label class="mt-2" for="">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control mt-2">
                </div>
                <div class="col-6">
                    <label class="mt-2" for="">Fecha Fin</label>
                    <input type="date" name="fecha_fin" class="form-control mt-2" disabled>
                </div>
            </div>
        </div>
    @endsection
    @section('form_close')
    </form>
@endsection
@section('scripts')
    <script>
        $("#user_id").select2({
            theme: "bootstrap-5",
        });
    </script>
@endsection
