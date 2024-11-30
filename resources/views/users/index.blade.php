@extends('layouts.main')
@section('title', 'EFSRT - Estudiante')
@section('section-title', 'Lista de Estudiantes')
@section('section-buttons')
    <div class="btn-group me-2">
        <a href="{{ route('users.create') }}" class="btn btn-success">
            <i class="bi bi-person-plus"></i> Nuevo Registro
        </a>
    </div>
@endsection
@section('content')
    <x-alert />
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="color: #143967">Nombre</th>
                    <th style="color: #143967">Apellido</th>
                    <th style="color: #143967">DNI</th>
                    <th style="color: #143967">Teléfono</th>
                    <th style="color: #143967">Correo</th>
                    <th style="color: #143967">Promoción</th>
                    @foreach ($modulos as $key => $modulo)
                        <th style="color: #143967">M{{ $key + 1 }}</th>
                    @endforeach
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
                        @foreach ($modulos as $modulo)
                            <td>
                                @php
                                    $practica = $user->practicas()->where('modulo_id','=',$modulo->id)->first();
                                @endphp
                                @if(isset($practica->id))
                                    @if($practica->terminado)
                                        <button class="btn btn-primary">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-warning">
                                            <i class="bi bi-hourglass-split"></i>
                                        </button>
                                    @endif
                                @else
                                    <button class="btn btn-danger">
                                        <i class="bi bi-x-octagon"></i>
                                    </button>
                                @endif
                            </td>
                        @endforeach
                        <td align="right">
                            <a href="{{ route('users.edit',$user->id) }}" class="mb-1 btn btn-warning"><i class="bi bi-pencil"></i> <span class="d-none d-md-inline">Editar</span></a>
                            <button data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $user->id }}" type="button" class="btn btn-danger"><i class="bi bi-trash3"></i> 
                                <span class="d-none d-md-inline">Eliminar</span>
                            </button>
                            @include('users.modal')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

