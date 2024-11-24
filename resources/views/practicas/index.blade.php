@extends('layouts.main')
@section('title', 'EFSRT - Prácticas')
@section('section-title', 'Lista de Prácticas')
@section('section-buttons')
    @hasanyrole('admin')
        <div class="btn-group me-2">
            <a href="{{ route('practicas.create') }}" class="btn btn-success">
                Nuevo Registro
            </a>
        </div>
    @endhasrole
@endsection
@section('content')
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Docente Supervisor</th>
                    <th>Empresa</th>
                    <th>Módulo</th>
                    <th>Fecha Inicio</th>
                    <th>Registrar Final</th>
                    <th>Terminado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($practicas as $practica)
                    <tr>
                        <td>{{ Str::upper($practica->user->lastname) }}, {{ Str::title($practica->user->name) }}</td>
                        <td>{{ $practica->docente }}</td>
                        <td>{{ $practica->empresa }}</td>
                        <td>{{ $practica->modulo->nombre }}</td>
                        <td>{{ $practica->fecha_inicio }}</td>
                        <td>
                            @if (isset($practica->fecha_final))
                                {{ $practica->fecha_final }}
                            @else
                                @hasrole('estudiante')
                                    <div class="btn-group" role="group">
                                        <input type="text" disabled
                                            value="{{ date('d-m-Y', strtotime(\Carbon\Carbon::now())) }}" class='form-control'>
                                        <p></p>
                                        <button data-bs-toggle="modal" data-bs-target="#modal-fecha-fin-{{ $practica->id }}"
                                            type="button" class="btn btn-secondary">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                        @include('practicas.modal-fecha-fin')
                                    </div>
                                @endhasrole
                            @endif
                        </td>
                        {{-- operador ternario --}}
                        <td>{{ $practica->terminado ? 'SI' : 'NO' }}</td>
                        @hasanyrole('admin')
                            <td>
                                <a href="{{ route('practicas.edit', $practica->id) }}" class="btn btn-warning">Editar</a>
                                <button data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $practica->id }}"
                                    type="button" class="btn btn-danger">
                                    Eliminar
                                </button>
                                @include('practicas.modal')
                            </td>
                        @endhasrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
