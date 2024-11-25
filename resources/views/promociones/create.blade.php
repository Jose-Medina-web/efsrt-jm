@extends('layouts.main')
@section('title', 'EFSRT - Promociones')
@section('section-title', 'Registrar Promoción')
@section('form_open')
    <form action="{{ route('promociones.store') }}" method="post">
        @csrf
    @endsection
    
    @section('section-buttons')
        <div class="btn-group me-2">
            <a href="{{ route('promociones.index') }}" class="btn btn-danger">
                <i class="bi bi-box-arrow-left"></i> Regresar
            </a>
            <button type="submit" class="btn btn-primary mx-1">
                <i class="bi bi-save"></i> Guardar
            </button>
        </div>
    @endsection
    @section('content')
    <div class="form-group">
        <label for="" style="color: #143967"><i class="bi bi-journal-plus"></i> <b>Nombre</b></label>
        <input type="number" id="promocion" name="nombre" value="{{ old('nombre') }}" class="form-control mt-2" placeholder="Ingrese el año de la promoción (Año de Ingreso)">
        
        @error('nombre')
        <div class="alert alert-danger mt-2 p-2" role="alert">
            <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
        </div>
        @enderror
    </div>
@section("form_close")
</form>
@endsection
@endsection