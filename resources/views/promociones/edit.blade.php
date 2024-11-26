@extends('layouts.main')
@section('title', 'EFSRT - Promociones')
@section('section-title', 'Editar Promoción')
@section('form_open')
<form action="{{ route('promociones.update',$promocione->id) }}" method="post">
    @csrf
    @method('put')
@endsection
    @section('section-buttons')
        <div class="btn-group me-2">
            <a href="{{ route('promociones.index') }}" class="btn btn-danger">
            Regresar
            </a>
            <button type="submit" class="btn btn-primary mx-1">
                Guardar
            </button>
        </div>
    @endsection
    @section('content')
    <div class="form-group">
        <label for="">Nombre</label>
        <input type="number" value="{{ $promocione->nombre }}" name="nombre" class="form-control mt-2">
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