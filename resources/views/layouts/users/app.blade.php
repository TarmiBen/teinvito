<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>

    <!-- vendor css -->
	<link href="/assets/lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/assets/lib/typicons.font/src/font/typicons.css" rel="stylesheet">
    <link href="/assets/lib/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="/assets/lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    <link href="/assets/lib/spectrum-colorpicker/spectrum.css" rel="stylesheet">

	<!-- Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/font-awesome/css/all.min.css">


    <!-- DashForge CSS -->
    <link rel="stylesheet" href="/assets/css/dashforge.css">
	<link rel="stylesheet" href="/assets/css/dashforge.demo.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/cropper.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/index.css">
    
    @yield('css')
</head>

<body class="pos-relative" data-bs-spy="scroll" data-bs-target="#navSection" data-offset="120">

    @guest

    @yield('content')

    @else

<header class="navbar navbar-header navbar-header-fixed">
  <a href="#" id="sidebarMenuOpen" class="burger-menu"><i data-feather="arrow-left"></i></a>
  <div class="navbar-brand">
	<a href="../index.html" class="df-logo">Te<span>Invito</span></a>
  </div><!-- navbar-brand -->
  <div id="navbarMenu" class="navbar-menu-wrapper">
	<div class="navbar-menu-header">
	  <a href="../index.html" class="df-logo">Te<span>Invito</span></a>
	  <a id="mainMenuClose" href="#"><i data-feather="x"></i></a>
	</div><!-- navbar-menu-header -->
	<!-- <ul class="nav navbar-menu">
	  <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>
	  <li class="nav-item with-sub">
		<a href="#" class="nav-link"><i data-feather="pie-chart"></i> Dashboard</a>
		<ul class="navbar-menu-sub">
		  <li class="nav-sub-item"><a href="../template/classic/dashboard-one.html" class="nav-sub-link"><i data-feather="bar-chart-2"></i>Sales Monitoring</a></li>
		  <li class="nav-sub-item"><a href="../template/classic/dashboard-two.html" class="nav-sub-link"><i data-feather="bar-chart-2"></i>Website Analytics</a></li>
		  <li class="nav-sub-item"><a href="../template/classic/dashboard-three.html" class="nav-sub-link"><i data-feather="bar-chart-2"></i>Cryptocurrency</a></li>
		  <li class="nav-sub-item"><a href="../template/classic/dashboard-four.html" class="nav-sub-link"><i data-feather="bar-chart-2"></i>Helpdesk Management</a></li>
		</ul>
	  </li>
	  <li class="nav-item with-sub">
		<a href="#" class="nav-link"><i data-feather="package"></i> Apps</a>
		<ul class="navbar-menu-sub">
		  <li class="nav-sub-item"><a href="../template/classic/app-calendar.html" class="nav-sub-link"><i data-feather="calendar"></i>Calendar</a></li>
		  <li class="nav-sub-item"><a href="../template/classic/app-chat.html" class="nav-sub-link"><i data-feather="message-square"></i>Chat</a></li>
		  <li class="nav-sub-item"><a href="../template/classic/app-contacts.html" class="nav-sub-link"><i data-feather="users"></i>Contacts</a></li>
		  <li class="nav-sub-item"><a href="../template/classic/app-file-manager.html" class="nav-sub-link"><i data-feather="file-text"></i>File Manager</a></li>
		  <li class="nav-sub-item"><a href="../template/classic/app-mail.html" class="nav-sub-link"><i data-feather="mail"></i>Mail</a></li>
		</ul>
	  </li>
	  <li class="nav-item with-sub">
		<a href="#" class="nav-link"><i data-feather="layers"></i> Pages</a>
		<div class="navbar-menu-sub">
		  <div class="d-lg-flex">
			<ul>
			  <li class="nav-label">Authentication</li>
			  <li class="nav-sub-item"><a href="../template/classic/page-signin.html" class="nav-sub-link"><i data-feather="log-in"></i> Sign In</a></li>
			  <li class="nav-sub-item"><a href="../template/classic/page-signup.html" class="nav-sub-link"><i data-feather="user-plus"></i> Sign Up</a></li>
			  <li class="nav-sub-item"><a href="../template/classic/page-verify.html" class="nav-sub-link"><i data-feather="user-check"></i> Verify Account</a></li>
			  <li class="nav-sub-item"><a href="../template/classic/page-forgot.html" class="nav-sub-link"><i data-feather="shield-off"></i> Forgot Password</a></li>
			  <li class="nav-label mg-t-20">User Pages</li>
			  <li class="nav-sub-item"><a href="../template/classic/page-profile-view.html" class="nav-sub-link"><i data-feather="user"></i> View Profile</a></li>
			  <li class="nav-sub-item"><a href="../template/classic/page-connections.html" class="nav-sub-link"><i data-feather="users"></i> Connections</a></li>
			  <li class="nav-sub-item"><a href="../template/classic/page-groups.html" class="nav-sub-link"><i data-feather="users"></i> Groups</a></li>
			  <li class="nav-sub-item"><a href="../template/classic/page-events.html" class="nav-sub-link"><i data-feather="calendar"></i> Events</a></li>
			</ul>
			<ul>
			  <li class="nav-label">Error Pages</li>
			  <li class="nav-sub-item"><a href="../template/classic/page-404.html" class="nav-sub-link"><i data-feather="file"></i> 404 Page Not Found</a></li>
			  <li class="nav-sub-item"><a href="../template/classic/page-500.html" class="nav-sub-link"><i data-feather="file"></i> 500 Internal Server</a></li>
			  <li class="nav-sub-item"><a href="../template/classic/page-503.html" class="nav-sub-link"><i data-feather="file"></i> 503 Service Unavailable</a></li>
			  <li class="nav-sub-item"><a href="../template/classic/page-505.html" class="nav-sub-link"><i data-feather="file"></i> 505 Forbidden</a></li>
			  <li class="nav-label mg-t-20">Other Pages</li>
			  <li class="nav-sub-item"><a href="../template/classic/page-timeline.html" class="nav-sub-link"><i data-feather="file-text"></i> Timeline</a></li>
			  <li class="nav-sub-item"><a href="../template/classic/page-pricing.html" class="nav-sub-link"><i data-feather="file-text"></i> Pricing</a></li>
			  <li class="nav-sub-item"><a href="../template/classic/page-help-center.html" class="nav-sub-link"><i data-feather="file-text"></i> Help Center</a></li>
			  <li class="nav-sub-item"><a href="../template/classic/page-invoice.html" class="nav-sub-link"><i data-feather="file-text"></i> Invoice</a></li>
			</ul>
		  </div>
		</div>
	  </li>
	  <li class="nav-item active"><a href="index-2.html" class="nav-link"><i data-feather="box"></i> Components</a></li>
	  <li class="nav-item"><a href="../collections/index.html" class="nav-link"><i data-feather="archive"></i> Collections</a></li>
	</ul> -->
  </div><!-- navbar-menu-wrapper -->
  	<div class="navbar-right">
		@include('layouts.users.navbar-menu')
		<!-- Avatar -->
		<a class="avatar avatar-sm p-0 ms-5" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
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
			@include('layouts.users.profile-options')
		</ul>
	</div>
  <!-- navbar-right -->
</header><!-- navbar -->

<div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components">
  <div class="sidebar-header">
	<a href="#" id="mainMenuOpen"><i data-feather="menu"></i></a>
	<h5>Components</h5>
	<a href="#" id="sidebarMenuClose"><i data-feather="x"></i></a>
  </div><!-- sidebar-header -->
  <div class="sidebar-body">
	  @include('layouts.users.sidebar-left')
  </div><!-- sidebar-body -->
</div><!-- sidebar -->

<!-- <div class="section-nav">
  <label class="nav-label">On This Page</label>
  <nav id="navSection" class="nav flex-column">
	<a href="#section1" class="nav-link">Input Box</a>
	<a href="#section2" class="nav-link">Validation State</a>
	<a href="#section3" class="nav-link">Checkboxes</a>
	<a href="#section4" class="nav-link">Radios</a>
	<a href="#section5" class="nav-link">Switches</a>
	<a href="#section6" class="nav-link">Select Menu</a>
	<a href="#section7" class="nav-link">Range</a>
	<a href="#section8" class="nav-link">File Browser</a>
	<a href="#section9" class="nav-link">Colorpicker</a>
  </nav>
</div> -->
<!-- df-section-nav -->

<div class="content content-components me-0">
  <div class="container-fluid">
	<!-- <ol class="breadcrumb df-breadcrumbs mg-b-10">
	  <li class="breadcrumb-item"><a href="#">Components</a></li>
	  <li class="breadcrumb-item"><a href="#">Forms</a></li>
	  <li class="breadcrumb-item active" aria-current="page">Form Elements</li>
	</ol> -->

	@yield('content')

	<footer class="content-footer">
	  <div>
		<span>&copy; 2023 DashForge v1.0.0. </span>
		<span>Made by <a href="http://themepixels.me/">ThemePixels</a></span>
	  </div>
	  <div>
		<nav class="nav">
		  <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
		  <a href="../change-log.html" class="nav-link">Change Log</a>
		  <a href="https://discordapp.com/invite/RYqkVuw" class="nav-link">Get Help</a>
		</nav>
	  </div>
	</footer><!-- content-footer -->

  </div><!-- container -->
</div><!-- content -->

    @endguest

<!-- Bootstrap JS -->
<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="/assets/vendor/choices/js/choices.min.js"></script>
<script src="/assets/vendor/overlay-scrollbar/js/overlayscrollbars.min.js"></script>

<!-- Template Functions -->
<script src="/assets/js/functions.js"></script>
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/cropper.js"></script>

</body>


</html>