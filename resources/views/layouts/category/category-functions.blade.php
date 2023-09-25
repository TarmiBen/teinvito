<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tittle')</title>

        <link href="assets/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="assets/lib/typicons.font/typicons.css" rel="stylesheet">
        <link href="assets/lib/prismjs/themes/prism-vs.css" rel="stylesheet">
        <!-- DashForge CSS -->
        <link rel="stylesheet" href="assets/css/dashforge.css">
        <link rel="stylesheet" href="assets/css/dashforge.demo.css">
</head>
<body>
 @yield('contenido')  

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