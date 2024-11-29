@extends('layouts.main')
@section('title', 'EFSRT - Estudiantes')
@section('section-title', 'Registrar Estudiante')
@section('form_open')
    <form action="{{ route('users.store') }}" method="post">
        @csrf
    @endsection
    @section('section-buttons')
        <div class="btn-group me-2">
            <a href="{{ route('users.index') }}" class="btn btn-danger">
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
                <div class="col-sm-12 col-md-6">
                    <label for="" style="color: #143967"><i class="bi bi-person-fill"></i> <b>Nombres</b></label>
                    <input type="text" name="name" class="form-control mt-2" value={{ old('name') }}>
                    @error('name')
                        <div class="alert alert-danger mt-2 p-2" role="alert">
                            <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                        </div>
                    @enderror
                </div>


                <div class="col-sm-12 col-md-6">
                    <label for="" style="color: #143967"><i class="bi bi-person-lines-fill"></i>
                        <b>Apellidos</b></label>
                    <input type="text" name="apellido" class="form-control mt-2" value={{ old('apellido') }}>
                    @error('apellido')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label for="" class="mt-2" style="color: #143967"><i class="bi bi-person-vcard"></i>
                        <b>DNI</b></label>
                    <input type="text" name="dni" class="form-control mt-2" value={{ old('dni') }}>
                    @error('dni')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 col-md-6">
                    <label for="" class="mt-2" style="color: #143967"><i class="bi bi-telephone-forward"></i>
                        <b>Teléfono</b></label>
                    <input type="tel" name="phone" class="form-control mt-2" value={{ old('phone') }}>
                    @error('phone')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <label for="" class="mt-2" style="color: #143967"><i class="bi bi-envelope"></i>
                        <b>Correo</b></label>
                    <input type="email" name="email" class="form-control mt-2" value={{ old('email') }}>
                    @error('email')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 col-md-3">
                    <label for="" class="mt-2" style="color: #143967"><i class="bi bi-lock"></i>
                        <b>Contraseña</b></label>
                    <input type="password" name="password" class="form-control mt-2" value={{ old('password') }}>
                    @error('password')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 col-md-3">
                    <label for="" class="mt-2" style="color: #143967"><i class="bi bi-lock"></i> <b>Confirmar
                            Contraseña</b></label>
                    <input type="password" name="password_confirmation" class="form-control mt-2" value={{ old('password_confirmation') }}>
                    @error('password')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 col-md-3">
                    <label for="" class="mt-2" style="color: #143967"><i class="bi bi-people"></i>
                        <b>Promoción</b></label>
                    <select name="promoción" class="form-control mt-2">
                        <option value={{ old('promocion') }} disabled selected>Seleccione el año de ingreso</option>
                        @foreach ($promociones as $promocione)
                            <option value="{{ $promocione->id }}" @if($promocione->id == old('promoción')) selected @endif>
                                {{ $promocione->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('promoción')
                    <div class="alert alert-danger mt-2 p-2" role="alert">
                        <small><i class="bi bi-exclamation-triangle"></i> {{ $message }}</small>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
    @section('form_close')
    </form>
@endsection
@endsection
