<!-- Modal -->
<form action="{{ route('users.registraruser') }}" method="post">
    @csrf
    @method('post')
    <div class="modal fade" id="modal-registrar-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Confirmar Acción</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ¿Estás seguro de registrar al estudiante?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
        </div>
    </div>
</form>