<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <x-nav-button text="Inicio" icon="bi bi-house" route="home" />
                @hasrole('admin')
                    <x-nav-button text="Estudiantes" icon="bi bi-people" route="users.index" />
                    <x-nav-button text="Promociones" icon="bi bi-book" route="promociones.index" />
                @endhasrole
                <x-nav-button text="Prácticas" icon="bi bi-book" route="practicas.index" />
            </ul>            
        </div>
    </div>
</div>