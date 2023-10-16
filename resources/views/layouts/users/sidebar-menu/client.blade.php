<li class="nav-label mg-b-15">Menú [Cliente]</li>
<li class="nav-item">
	<a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
		<i data-feather="layout"></i> 
		Dashboard
	</a>
</li>
<li class="nav-item">
	<a href="#" class="nav-link with-sub">
		<i data-feather="layers"></i> 
		Menú desplegable
	</a>
	<nav class="nav">
		<a href="#">
			Opción 1
		</a>
		<a href="#">
			Opción 2
		</a>
	</nav>
</li>
