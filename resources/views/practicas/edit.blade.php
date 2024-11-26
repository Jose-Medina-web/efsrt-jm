@extends('layouts.main')
@section('title', 'EFSRT - Prácticas')
@section('section-title', 'Editar Práctica')
@section('form_open')
    <form action="{{ route('practicas.update',$practica->id) }}" method="post">
        @csrf
        @method('put')
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
                    <select class="form-control" id="estudiante" name="estudiante" disabled>
                        <option value="">Seleccione un estudiante</option>
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}" @if($estudiante->id == $practica->user_id) selected @endif>
                                {{ Str::upper($estudiante->lastname) }}, {{ Str::title($estudiante->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('estudiante')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>
                


                <div class="col-6">
                    <label for="">Docente Supervisor </label>
                    <input type="text" name="docente" class="form-control mt-2" value="{{ $practica->docente }}"/>
                    @error('docente')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label class="mt-2" for="">Empresa</label>
                    <input type="text" name="empresa" class="form-control mt-2" value="{{ $practica->empresa }}" />
                    @error('empresa')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="mt-2" for="">Módulo</label>
                    <select name="modulo_id" id="modulo_id" class="form-control mt-2" disabled>
                        <option value="">Seleccione un módulo</option>
                        @foreach ($modulos as $modulo)
                            <option value="{{ $modulo->id }}" @if($modulo->id == $practica->modulo_id) selected @endif>
                                {{ $modulo->nombre }}
                            </option>
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
                    <label class="mt-2" for="">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control mt-2" value="{{ date('Y-m-d',strtotime($practica->fecha_inicio)) }}" />    
                    @error('fecha_inicio')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="mt-2" for="">Fecha Fin</label>
                    <input type="date" name="fecha_fin" class="form-control mt-2" disabled />
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
