@extends('layouts.main')
@section('title', 'EFSRT - Promociones')
@section('section-title', 'Lista de Promociones')
@section('section-buttons')
    <div class="btn-group me-2">
        <a href="{{ route('promociones.create') }}" class="btn btn-success">
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promociones as $promocione)
                    <tr>
                        <td>{{ $promocione->nombre }}</td>
                        <td align="right">
                            <a href="{{ route('promociones.edit',$promocione->id) }}" class="btn btn-warning">Editar</a>
                            <button data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $promocione->id }}" type="button" class="btn btn-danger">
                                Eliminar
                            </button>
                            @include('promociones.modal')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

