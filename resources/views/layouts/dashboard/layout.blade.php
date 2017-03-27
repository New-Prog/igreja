<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Igreja Bastista Vinho Novo - Dashboard </title>

    <!-- Bootstrap core CSS -->
    <link href="/dashboard_layout/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/dashboard_layout/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/dashboard_layout/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="/dashboard_layout/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/javascript" href="/dashboard_layout/js/jquery.js" />
    <link rel="stylesheet" type="text/css" href="/dashboard_layout/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="/dashboard_layout/css/style.css" rel="stylesheet">
    <link href="/dashboard_layout/css/style-responsive.css" rel="stylesheet">

    <script src="/dashboard_layout/js/chart-master/Chart.js"></script>
    <script type="text/javascript" src="/dashboard_layout/js/jquery.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<section id="container" >
    <!--Cabecalho start-->
    @include('layouts.dashboard.cabecalho')
    <!--Cabecalho end-->

    <!--Menu start-->
    @include('layouts.dashboard.menu')
    <!--Menu end-->

    <!--Conteudo content start-->

    <section id="main-content">
        <section class="wrapper" id="conteudo-principal">
            @yield('conteudo')
        </section>
    </section>
    <!--conteudo content end-->

    <!--Menu start-->
    @include('layouts.dashboard.rodape')
    <!--Menu end-->
</section>

  </body>
</html>
