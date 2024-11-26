<div>
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
@if (session('info'))
    <div class="alert alert-success" role="alert">
        {{ session('info') }}
    </div>
@endif
</div>