@extends('layouts.main')
@section('title', 'EFSRT - Promociones')
@section('section-title', 'Editar Promocion')
<form action="{{ route('promociones.update',$promocione->id) }}" method="post">
    @csrf
    @method('put')
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
        <input type="number" value="{{ $promocione->nombre }}" name="nombre" class="form-control mt-2" placeholder="ingrese el año de la promoción">
    </div>
</form>
@endsection