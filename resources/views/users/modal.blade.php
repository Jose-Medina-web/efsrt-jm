<!-- Modal -->
<form class="d-inline" action="{{ route('users.delete',$user->id) }}" method="post">
    @csrf
    @method('delete')
    <div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
            <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Confirmar Acción</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" align="center">
            Esta seguro de eliminar al estudiante: {{ Str::upper($user->lastname)  }}, {{ Str::title($user->name) }}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
        </div>
    </div>
</form>