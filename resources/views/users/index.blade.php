@extends('layouts.main')
@section('title', 'EFSRT - Estudiante')
@section('section-title', 'Lista de Estudiantes')
@section('section-buttons')
    <div class="btn-group me-2">
        <a href="{{ route('users.create') }}" class="btn btn-success">
            Nuevo Registro
        </a>
    </div>
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="color: #143967">Nombre</th>
                    <th style="color: #143967">Apellido</th>
                    <th style="color: #143967">DNI</th>
                    <th style="color: #143967">Teléfono</th>
                    <th style="color: #143967">Correo</th>
                    <th style="color: #143967">Promocion</th>
                    <th style="color: #143967"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->dni }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ isset($user->promociones[0]->nombre) ? $user->promociones[0]->nombre  : null }}</td>
                        <td align="right">
                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning px-4">Editar</a>
                            <button data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $user->id }}" type="button" class="btn btn-danger px-3">
                                Eliminar
                            </button>
                            @include('users.modal')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

