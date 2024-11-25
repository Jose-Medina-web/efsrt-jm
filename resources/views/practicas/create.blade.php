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
                <i class="bi bi-box-arrow-left"></i> Regresar
            </a>
            <button type="submit" class="btn btn-primary mx-1">
                <i class="bi bi-save"></i> Guardar
            </button>
        </div>
    @endsection
    @section('content')
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label class="mb-2" for="" style="color: #143967"><i class="bi bi-person-fill"></i> <b>Estudiante</b></label>
                    <select class="form-control" id="estudiante" name="estudiante">
                        <option value="">Seleccione un estudiante</option>
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}" @if($estudiante->id == old('estudiante')) selected @endif>{{ Str::upper($estudiante->lastname) }},
                                {{ Str::title($estudiante->name) }}</option>
                        @endforeach
                    </select>
                    @error('estudiante')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                    
                </div>
                <div class="col-6">
                    <label for="" style="color: #143967"><i class="bi bi-briefcase"></i> <b>Docente Supervisor</b> </label>
                    <input  type="text" name="docente" class="form-control mt-2" value={{ old('docente') }}>
                    @error('docente')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label class="mt-2" for="" style="color: #143967"><i class="bi bi-building-check"></i> <b>Empresa</b></label>
                    <input type="text" name="empresa" class="form-control mt-2" value="{{ old('empresa') }}">
                    @error('empresa')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="mt-2" for="" style="color: #143967"><i class="bi bi-tablet-landscape"></i> <b>Módulo</b></label>
                    <select name="modulo_id" id="modulo_id" class="form-control mt-2">
                        <option value="">Seleccione un módulo</option>
                        @foreach ($modulos as $modulo)
                            <option value="{{ $modulo->id }}" @if($modulo->id == old('modulo_id')) selected @endif >{{ $modulo->nombre }}</option>
                        @endforeach
                    </select>
                    @error('modulo_id')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label class="mt-2" for="" style="color: #143967"><i class="bi bi-calendar"></i> <b>Fecha Inicio</b></label>
                    <input type="date" name="fecha_inicio" class="form-control mt-2" value="{{ old('fecha_inicio') }}">
                    @error('fecha_inicio')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="mt-2" for="" style="color: #143967"><i class="bi bi-calendar-check"></i> <b>Fecha Fin</b></label>
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
        $("#estudiante").select2({
            theme: "bootstrap-5",
        });
    </script>
@endsection
