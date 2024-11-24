<!-- Modal -->
<form action="{{ route('practicas.registrarfinal',$practica->id) }}" method="post">
    @csrf
    @method('put')
    <div class="modal fade" id="modal-fecha-fin-{{ $practica->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmar Acción</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ¿Estás seguro de registrar el final de tu práctica?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info">Registrar</button>
            </div>
        </div>
        </div>
    </div>
</form>