index
@extends('layouts.main')
@section('title', 'EFSRT - Prácticas')
@section('section-title', 'Lista de Prácticas')
@section('section-buttons')
    <div class="btn-group me-2">
        <a href="{{ route('practicas.create') }}" class="btn btn-success">
            Nuevo Registro
        </a>
    </div>
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Docente Supervisor</th>
                    <th>Empresa</th>
                    <th>Módulo</th>
                    <th>Fecha_Inicio</th>
                    <th>Fecha_Fin</th>
                    <th>Terminado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($practicas as $practica)
                    <tr>
                        <td>{{ $practica->user_id }}</td>
                        <td>{{ $practica->docente }}</td>
                        <td>{{ $practica->empresa }}</td>
                        <td>{{ $practica->modulo_id }}</td>
                        <td>{{ $practica->fecha_inicio }}</td>
                        <td>{{ $practica->fecha_final }}</td>
                        <td>{{ $practica->terminado }}</td>
                        <td>
                            <a href="{{ route('practicas.edit',$practica->id) }}" class="btn btn-warning">Editar</a>
                            <button data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $practica->id }}" type="button" class="btn btn-danger">
                                Eliminar
                            </button>
                            @include('practicas.modal')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection