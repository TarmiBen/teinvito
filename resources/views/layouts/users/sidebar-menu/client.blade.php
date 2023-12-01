<li class="nav-label mg-b-15">Menú [Cliente]</li>
<li class="nav-item">
	<a href="{{route('home')}}" class="nav-link">
		<i data-feather="layout"></i> 
		Dashboard
	</a>
</li>
<li class="nav-item">
	<a href="#" class="nav-link with-sub">
		<i data-feather="calendar"></i>
		Eventos
	</a>
	<nav class="nav">
		<a href="{{route('event.index')}}" class="nav-link">Ver todos</a>
		<a href="{{route('event.create')}}">Nuevo evento</a>
		<a href="{{route('guests.index')}}">Ver invitados</a>
		<a href="{{route('guests.create')}}">Nuevo invitado</a>
	</nav>
</li>

<li class="nav-item">
	<a href="#" class="nav-link with-sub">
		<i data-feather="mail"></i> 
		Invitaciones
	</a>
	<nav class="nav">
		<a href="{{route('admin.invitations.index')}}">Ver invitaciones</a>
		<a href="{{route('admin.invitations.create')}}">Nueva invitación</a>
	</nav>
</li>

<li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Esta sección es para volverse proveedor de servicios">
	<a href="#" class="nav-link with-sub">
		<i data-feather="briefcase"></i> 
		Compañias
	</a>
	<nav class="nav">
		<a href="{{route('admin.companies.create')}}">Nueva compañia</a>
	</nav>
</li>


