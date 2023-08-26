<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendor/choices/css/choices.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendor/overlay-scrollbar/css/overlayscrollbars.min.css">
    
    <!-- Styles CSS -->
    @vite(['resources/sass/app.scss'])
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    
    @yield('css')
</head>

<body class="bg-white">

@guest
<div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="top-menu py-3 border-bottom mb-3 d-flex justify-content-end">
                        @if (Route::has('login'))
						<div>
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</div>
                        @endif

                        @if (Route::has('register'))
						<div class="ms-4">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@yield('content')

@else

<!-- Main content START -->
<main>
	
<!-- Sidebar -->
<nav class="navbar sidebar navbar-expand-xl navbar-dark bg-dark">

	<!-- Navbar brand for xl -->
	<div class="d-flex align-items-center">
		<a class="navbar-brand" href="index-2.html">
			<img class="navbar-brand-item" src="/assets/images/logo.svg" alt="Te-invito-logo">
		</a>
	</div>
	<!-- Navbar brand for xl END -->
	
	<div class="offcanvas offcanvas-start flex-row custom-scrollbar h-100" data-bs-backdrop="true" tabindex="-1" id="offcanvasSidebar">
		<div class="offcanvas-body sidebar-content d-flex flex-column bg-dark">

			<!-- Sidebar menu START -->
			<ul class="navbar-nav flex-column" id="navbar-sidebar">
				@include('layouts.aside-menu')
			</ul>
			<!-- Sidebar menu end -->

			<!-- Sidebar footer -->
			<div class="px-3 mt-auto pt-3 pb-2">
				<div class="d-flex align-items-center justify-content-between text-primary-hover">
					<a class="h5 mb-0 text-secondary" href="admin-setting.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Configuración">
						<i class="bi bi-gear-fill"></i>
					</a>
					<a class="h5 mb-0 text-secondary" href="index-2.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Home">
						<i class="bi bi-globe"></i>
					</a>
					<a class="h5 mb-0 text-danger" href="{{ route('logout') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Cerrar Sesión" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<i class="bi bi-power"></i>
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</div>
			</div>
			<!-- Sidebar footer END -->
			
		</div>
	</div>
</nav>
<!-- Sidebar END -->

<!-- Page content -->
<div class="page-content">
	
	<!-- Top bar -->
	<nav class="navbar top-bar navbar-light bg-light border-bottom py-0 py-xl-3">
		<div class="container-fluid p-0">
			<div class="d-flex align-items-center w-100">

				<!-- Logo -->
				<div class="d-flex align-items-center d-xl-none">
					<a class="navbar-brand" href="index-2.html">
						<img class="light-mode-item navbar-brand-item h-30px" src="/assets/images/logo-mobile.svg" alt="logo-mobil">
						<!-- <img class="dark-mode-item navbar-brand-item h-30px" src="/assets/images/logo-mobile-light.svg" alt=""> -->
					</a>
				</div>
				<!-- Logo END -->

				<!-- Toggler for sidebar -->
				<div class="navbar-expand-xl sidebar-offcanvas-menu">
					<button class="navbar-toggler me-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar" aria-expanded="false" aria-label="Toggle navigation" data-bs-auto-close="outside">
						<i class="bi bi-text-right fa-fw h2 lh-0 mb-0 rtl-flip" data-bs-target="#offcanvasMenu"> </i>
					</button>
				</div>
				<!-- Toggler for sidebar END -->
				
				<!-- Top bar left -->
				<div class="navbar-expand-lg ms-auto ms-xl-0">
					
					<!-- Toggler for menubar -->
					<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTopContent" aria-controls="navbarTopContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-animation">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</button>
					<!-- Toggler for menubar END -->

					<!-- Topbar menu -->
					<div class="collapse navbar-collapse w-100" id="navbarTopContent">
						<!-- Top search -->
						<div class="nav my-3 my-xl-0 flex-nowrap align-items-center">
							<div class="nav-item w-100">
								<!-- <form class="position-relative">
									<input class="form-control pe-5 bg-secondary bg-opacity-10 border-0" type="search" placeholder="Search" aria-label="Search">
									<button class="bg-transparent px-2 py-0 border-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 text-primary"></i></button>
								</form> -->
							</div>
						</div>
						<!-- Top search END -->
					</div>
					<!-- Topbar menu END -->
				</div>
				<!-- Top bar left END -->
				
				<!-- Top bar right -->
				<div class="ms-xl-auto">
					<ul class="navbar-nav flex-row align-items-center">

						<!-- Profile dropdown -->
						<li class="nav-item me-4 ms-md-3 dropdown">
							<!-- Avatar -->
							<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
								<img class="avatar-img rounded-circle" src="/assets/images/avatar/01.jpg" alt="avatar">
							</a>

							<!-- Profile dropdown -->
							<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
								<!-- Profile info -->
								<li class="px-3">
									<div class="d-flex align-items-center">
										<!-- Avatar -->
										<div class="avatar me-3 mb-3">
											<img class="avatar-img rounded-circle shadow" src="assets/images/avatar/01.jpg" alt="avatar">
										</div>
										<div>
											<a class="h6 mt-2 mt-sm-0" href="#">Emmanuel Santoyo</a>
											<p class="small m-0">example@gmail.com</p>
										</div>
									</div>
								</li>
                                <li>            
                                    <hr class="dropdown-divider">
                                </li>
								<!-- Links -->
                                @include('layouts.profile-options')
                            </ul>
							<!-- Profile dropdown END -->
						</li>
						<!-- Profile dropdown END -->
					</ul>
				</div>
				<!-- Top bar right END -->
			</div>
		</div>
	</nav>
	<!-- Top bar END -->

	<!-- Page main content -->
	<div class="m-5">
        @yield('content')
	</div>
	<!-- Page main content END -->

</div>
<!-- Page content END -->

</main>

@endguest

<!-- Bootstrap JS -->
<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="/assets/vendor/choices/js/choices.min.js"></script>
<script src="/assets/vendor/overlay-scrollbar/js/overlayscrollbars.min.js"></script>

<!-- Template Functions -->
<script src="/assets/js/functions.js"></script>

</body>

</html>
