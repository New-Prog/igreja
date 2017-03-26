<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Igreja</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <!-- <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" /> -->
    <!-- <script src="assets/js/chart-master/Chart.js"></script> -->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.js"></script>
    <link rel="stylesheet" href="bower_components/sweetalert/dist/sweetalert.css" type="text/css" >
    <script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
  </head>

  <body>


    <section id="container" >

        <!--Cabecalho start-->
        @include('layouts/cabecalho')
        <!--Cabecalho end-->

        <!--Menu start-->
        <!--Menu end-->

        <!--Conteudo content start-->

        <section id="main-content">
            <section class="wrapper">
                @yield('conteudo')
            </section>
        </section>
        <!--conteudo content end-->
    </section>

  </body>
</html>
