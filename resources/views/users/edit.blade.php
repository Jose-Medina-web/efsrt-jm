@extends('layouts.main')
@section('title', 'EFSRT - Estudiantes')
@section('section-title', 'Editar Estudiante')
<form action="{{ route('users.update',$user->id) }}" method="post">
    @csrf
    @method('put')
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
        <label for="">Nombre</label>
        <input type="text" value="{{ $user->name }}" name="name" class="form-control mt-2">

        <label for="">Apellido</label>
        <input type="text" value="{{ $user->lastname }}" name="lastname" class="form-control mt-2">

        <label for="">DNI</label>
        <input type="number" value="{{ $user->dni }}" name="dni" class="form-control mt-2">

        <label for="">Teléfono</label>
        <input type="number" value="{{ $user->phone }}" name="phone" class="form-control mt-2">

        <label for="">Correo</label>
        <input type="email" value="{{ $user->email }}" name="email" class="form-control mt-2">

        <label for="">Password</label>
        <input type="password" value="{{ $user->password }}" name="password" class="form-control mt-2">
        <label for="">Promoción</label>
        <select name="promocione_id[]" class="form-control mt-2">
            <option value="0" disabled selected>Seleccione el año de ingreso</option>
            @foreach ($promociones as $promocione)
                <option value="{{ $promocione->id }}" 
                    @if ($promocione->id == $user->promociones[0]->id) selected @endif>
                    {{ $promocione->nombre }}
                </option>               
            @endforeach
        </select>
    </div>
</form>
@endsection