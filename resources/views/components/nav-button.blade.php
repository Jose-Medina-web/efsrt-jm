<div>
    <li class="nav-item">
        <a class="@if(Route::currentRouteName() == $route) link-active @endif nav-link d-flex align-items-center gap-2 active" aria-current="page"
            href="{{ route($route) }}">
            <i class="{{ $icon }}"></i>
            {{ $text }}
        </a>
    </li>
</div>