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
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th></th>
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
                        <td>
                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning">Editar</a>
                            <button data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $user->id }}" type="button" class="btn btn-danger">
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

