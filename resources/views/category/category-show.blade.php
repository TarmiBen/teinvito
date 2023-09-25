<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="shortcut icon" type="image/" href="">
        <title>Mostrar Categoria</title>
        <link href="assets/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="assets/lib/typicons.font/typicons.css" rel="stylesheet">
        <link href="assets/lib/prismjs/themes/prism-vs.css" rel="stylesheet">
    
        <!-- DashForge CSS -->
        <link rel="stylesheet" href="{{asset ('assets/css/dashforge.css')}}">
        <link rel="stylesheet" href="{{asset ('assets/css/dashforge.demo.css')}}">
    </head>

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

    <div id="sidebarMenu" class="sidebar sidebar-fixed sidebar-components ">
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
                    <nav class="nav">
                        <!-- <a href="#">Ver todo</a>
                        <a href="#">Agregar nueva categoria</a> -->
                    </nav>
                </li>
            </ul>
        </div>
        <div class="section-nav">
          <label class="nav-label">En esta pagina</label>
          <nav id="navSection" class="nav flex-column">
            <a href="" class="nav-link active">Mostrar categoria</a>
          </nav>
        </div>
    </div>
    <div class="content content-components bg-gray-1 ">
      <h1 class="df-title">Categorias</h1>
        <section id="1">
          
          <table class="table table-bordered table-striped table-dark">
            
            <thead>
              <tr>
                <th>ID</th>
                <th>Categoria</th>
                <th>Nombre</th>
              </tr>
            </thead>
            <tbody>
              
              <tr>              
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->category_id}}</td>
                <td>{{$categoria->name}}</td>          
              </tr>   
            </tbody>
          </table>
        </section>        
        <br>
        <br>
        <a href="{{route('category')}}" class="btn icon typcn typcn-arrow-back-outline btn btn-outline-info ">Regresar</a>
        <footer class="content-footer">
          <div>
            <span>&copy;  </span>
            <span>Made by <a href=""></a>benito</span>
          </div>
          <div>
            <nav class="nav">
              
            </nav>
          </div>
        </footer>
      </div><!-- container -->
    </div><!-- content -->

    <script src="assets/lib/jquery/jquery.min.js"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/feather-icons/feather.min.js"></script>
    <script src="assets/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/lib/prismjs/prism.js"></script>
    <script src="assets/js/dashforge.js"></script>
    <script>
      $(function(){
        'use strict'
      });
    </script>
  </body>
</html>
