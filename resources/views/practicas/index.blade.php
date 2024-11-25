@extends('layouts.main')
@section('title', 'EFSRT - Prácticas')
@section('section-title', 'Lista de Prácticas')
@section('section-buttons')
    @hasanyrole('admin')
        <div class="btn-group me-2">
            <a href="{{ route('practicas.create') }}" class="btn btn-success">
                <i class="bi bi-plus-square"></i> Nuevo Registro
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
                    <th style="color: #143967">Estudiante</th>
                    <th style="color: #143967">Docente Supervisor</th>
                    <th style="color: #143967">Empresa</th>
                    <th style="color: #143967">Módulo</th>
                    <th style="color: #143967">Fecha Inicio</th>
                    <th style="color: #143967">Registrar Final</th>
                    <th style="color: #143967">Terminado</th>
                    <th style="color: #143967"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($practicas as $practica)
                    <tr>
                        <td class="mt-2">{{ Str::upper($practica->user->lastname) }}, {{ Str::title($practica->user->name) }}</td>
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
                                            type="button" class="btn btn-primary">
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
                            <td align="right">
                                <a href="{{ route('practicas.edit', $practica->id) }}" class="mt-1 btn btn-warning"><i class="bi bi-pencil"></i> <span class="d-none d-md-inline">Editar</span> </a>
                                <button data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $practica->id }}"
                                    type="button" class="mt-1 btn btn-danger">
                                    <i class="bi bi-trash3"></i> <span class="d-none d-md-inline">Eliminar</span> 
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
