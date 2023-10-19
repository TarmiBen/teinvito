<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

        <link href="/assets/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="/assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="/assets/lib/typicons.font/typicons.css" rel="stylesheet">
        <link href="/assets/lib/prismjs/themes/prism-vs.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- DashForge CSS -->
        <link rel="stylesheet" href="/assets/css/dashforge.css">
        <link rel="stylesheet" href="/assets/css/dashforge.demo.css">
        @yield('css')
</head>



@livewireStyles

<body class="pos-relative " data-spy="scroll" data-target="#navSection" data-offset="120" >

    <header class="navbar navbar-header navbar-header-fixed">
        <a href="el-icons.html" id="sidebarMenuOpen" class="burger-menu"><i data-feather="arrow-left"></i></a>
        <div class="navbar-brand">
          <a href="../index.html" class="df-logo">dash<span>forge</span></a>
        </div><!-- navbar-brand -->
        <div id="navbarMenu" class="navbar-menu-wrapper">
          <div class="navbar-menu-header">
            <a href="../index.html" class="df-logo">dash<span>forge</span></a>
            <a id="mainMenuClose" href="el-icons.html"><i data-feather="x"></i></a>
          </div>
    </header>

    <div id="sidebarMenu " class="sidebar sidebar-fixed sidebar-components ">
        <div class="sidebar-header">
            <a href="" id="mainMenuOpen"><i data-feather="menu"></i></a>
            <h5>Componentes</h5>
            <a href="" id="sidebarMenuClose"><i data-feather="x"></i></a>
        </div>
        <div class="sidebar-body">    
            <ul class="sidebar-nav">
                <li class="nav-label mg-b-15">Herramientas</li>
                    <li class="nav-item show">
                    <a class="nav-link active" ><i data-feather="layers"></i> Categorias</a>
                </li>
            </ul>
        </div>
        <div class="section-nav">
          <label class="nav-label">En esta pagina</label>
          <nav id="navSection" class="nav flex-column">
            <a href="" class="nav-link active"></a>
          </nav>
        </div>
    </div>


    @yield('content')  
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/assets/lib/jquery/jquery.min.js"></script>
    <script src="/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/lib/feather-icons/feather.min.js"></script>
    <script src="/assets/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/lib/prismjs/prism.js"></script>
    <script src="/assets/js/dashforge.js"></script>
    <script src="/assets/js/category.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(function(){
        'use strict'
      });
    </script>
    
    @yield('scripts')
</body>
</html>