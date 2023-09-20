<li>
    <a class="dropdown-item" href="{{ route('profile.index') }}">
        <i class="bi bi-person fa-fw me-2"></i>
        Editar Perfil
    </a>
</li>

<li>
    <a class="dropdown-item text-primary" href="{{ route('my-subscription.index') }}">
        <i class="bi bi-stars"></i>
        Mi Suscripción
    </a>
</li>


<!-- <li>
    <a class="dropdown-item" href="#">
        <i class="bi bi-gear fa-fw me-2"></i>
        Account Settings
    </a>
</li> -->
<!-- <li>
    <a class="dropdown-item" href="#">
        <i class="bi bi-info-circle fa-fw me-2"></i>
        Help
    </a>
</li> -->

<li>
    <a class="dropdown-item bg-danger-soft-hover" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-power fa-fw me-2"></i>
        Cerrar Sesión
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>

<!-- <li> <hr class="dropdown-divider"></li> -->
    