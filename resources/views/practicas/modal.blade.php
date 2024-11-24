<!-- Modal -->
<form class="d-inline" action="{{ route('practicas.delete',$user->id) }}" method="post">
    @csrf
    @method('delete')
    <div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Acción</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ¿Está seguro de eliminar regitro de la práctica? {{ $user->nombre }}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
        </div>
    </div>
</form>