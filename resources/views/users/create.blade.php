@extends('layouts.main')
@section('title', 'EFSRT - Estudiantes')
@section('section-title', 'Registrar Estudiante')
<form action="{{ route('users.store') }}" method="post">
    @csrf
    @section('section-buttons')
        <div class="btn-group me-2">
            <a href="{{ route('users.index') }}" class="btn btn-danger">
            Regresar
            </a>
            <button type="submit" class="btn btn-primary mx-1">
                Guardar
            </button>
        </div>
    @endsection
    @section('content')
    <div class="form-group">
        <label for="">Nombres</label>
        <input type="text" name="name" class="form-control mt-2" placeholder="">

        <label for="">Apellidos</label>
        <input type="text" name="lastname" class="form-control mt-2" placeholder="">

        <label for="">DNI</label>
        <input type="text" name="dni" class="form-control mt-2" placeholder="">

        <label for="">Teléfono</label>
        <input type="tel" name="phone" class="form-control mt-2" placeholder="">

        <label for="">Correo</label>
        <input type="email" name="email" class="form-control mt-2" placeholder="">

        <label for="">Contraseña</label>
        <input type="password" name="password" class="form-control mt-2" placeholder="">

        <label for="">Promoción</label>
        <select name="promocione_id[]" class="form-control mt-2">
            <option value="0" disabled selected>Seleccione el año de ingreso</option>
            @foreach ($promociones as $promocione)
                <option value="{{ $promocione->id }}">
                    {{ $promocione->nombre }}
                </option>               
            @endforeach
        </select>
    </div>
</form>
@endsection