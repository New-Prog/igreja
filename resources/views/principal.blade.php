@extends('layouts.layout')
@section('content')
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet" media="screen">
<link href="css/css-index.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" />
<!--<script type="text/javascript" src="js/exit-popup.js"></script>-->
<script type="text/javascript">
</script>
<body  data-spy="scroll" data-target="#ebook">
       <div id="top"></div>

    <div id="menu">
        <nav class="navbar-wrapper navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-backyard">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand site-name" href="#top">Sistema de células <!--<img src="images/logo2.png" alt="logo">--></a>
                  </div>

                  <div id="navbar-scroll" class="collapse navbar-collapse navbar-backyard navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="#team">Nosso Time</a></li>
                        <li><a href="#blog">Sobre o sistema</a></li>
                        <li><a href="#contato">Contato</a></li>
                        <li><a href="/login">Área restrita</a></li>
                    </ul>
                  </div>
            </div>
        </nav>
    </div>
    <section id="ebook">
    <div class="fullscreen landing parallax" data-img-width="2000" data-img-height="1333" data-diff="100">

    <video poster="images/bg_video.jpg" id="bgvid" playsinline autoplay muted loop>
    <source src="video/background-index.mp4" type="video/mp4">
    </video>

        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-7" id="cel">

                        <div class="logo wow fadeInDown">
                        <!--<a href=""><img src="images/logo.png" alt="logo"></a>-->
                        </div>

                            <h1 class="wow fadeInLeft">
                            <strong>Sistema de Células</strong>
                            </h1>

                        <div class="landing-text wow fadeInUp">
                            <p>Sistema de controle e gestão de células evangélicas.</p>
                            <ul>
                                <li>Saiba qual é a presença dos membros em seus grupos em tempo real.</li>
                                <li>Tenha em mãos todo cadastro de membros das células.</li>
                                <li>Tenha relátorios completos das céluas de sua igreja.</li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-md-5">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <div class="signup-header wow fadeInUp">
                            <h3 class="form-title text-center"><p><strong>Conheça nosso sistema! </strong></p> Quer conhecer um dos melhores sistemas de céluas evangélicas do Brasil?</p><p>Inscreva-se que entraremos em contato!</p>
                            <form class="form-header" method="POST" id="#">
                            <input type="hidden" name="u" value="503bdae81fde8612ff4944435">
                            <input type="hidden" name="id" value="bfdba52708">
                                <div class="form-group">
                                    <input class="form-control input-lg" name="nome" id="nome" type="text" placeholder="Nome" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" name="email" id="email" type="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" name="telefone" id="telefone" type="text" placeholder="Telefone" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" name="igreja" id="igreja" type="text" placeholder="Nome da igreja" required>
                                </div>
                                <div class="form-group last">
                                    <button type="button" class="btn btn-warning btn-block btn-lg" id="btnEnviar">Sim, quero conhecer!</button>
                                </div>
                                <p class="privacy text-center">

                                </p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
        </section>

    <section id="blog">
        <div class="container">
        <div class="row">
            <div class="text-center">
                <h2 id="t"><strong>Sobre o sistema</strong></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail">
                    <img src="images/sistema1.png" alt="Cloves Junior Dev">
                    <div class="caption">
                      <h2 style="color:black;text-shadow: none!important; ">Loren Ipsun.</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ullamcorper eu dui in efficitur. Quisque vehicula malesuada enim, sit amet pharetra nunc placerat eu. Nam vulputate in lectus id ultricies. Cras porttitor placerat scelerisque. Maecenas lacinia vestibulum eleifend. Mauris a enim accumsan odio vehicula suscipit a id leo. Phasellus erat lectus, scelerisque sit amet diam vel, posuere venenatis sapien. Duis suscipit elit quis magna suscipit facilisis. Nunc fermentum metus eget velit condimentum sollicitudin. Mauris justo ex, rutrum non posuere quis, fermentum quis diam. Integer varius commodo metus, sed sollicitudin justo convallis id. Cras vestibulum molestie augue fermentum malesuada.</p>

                      <p>Ut euismod nec erat vel faucibus. Suspendisse laoreet tincidunt est eu sodales. Nam consequat rhoncus nulla a mattis. Cras viverra nec erat at tincidunt. Proin pulvinar in diam quis tincidunt. Vivamus ornare posuere neque, nec condimentum est vulputate in. Nunc mattis nisi a orci maximus ullamcorper. Sed dapibus vel turpis quis volutpat. Integer eleifend turpis id velit elementum, sed volutpat risus aliquet. Vestibulum porta neque quis consectetur congue. Fusce scelerisque neque vel odio elementum porta. Nam ut diam non velit dictum faucibus.

                        <p>Nam facilisis pretium erat sit amet ultrices. Nullam ac felis ornare, tincidunt est id, molestie tellus. Aenean ut leo congue, fringilla lorem ut, malesuada velit. Aenean rhoncus, velit molestie dictum volutpat, nunc massa euismod est, et bibendum nunc augue ac urna. Maecenas iaculis ut tellus non scelerisque. Quisque egestas, justo ac semper viverra, nisl metus consectetur velit, sed bibendum dui lacus sed enim. Fusce id nunc vel odio eleifend ullamcorper. Nunc malesuada, elit et porta consequat, ex justo feugiat arcu, vitae dignissim nibh nunc sed metus. Proin sed neque vitae nibh hendrerit viverra. Nulla facilisi. Phasellus dolor magna, accumsan a pellentesque quis, feugiat eu sapien. Nulla aliquet purus et mauris viverra porta. Sed ut ante cursus, sagittis ligula lacinia, varius ex. Curabitur vitae fermentum elit. Aenean ac nulla sed risus tincidunt tincidunt.</p>

                      <i class="glyphicon glyphicon-thumbs-up pull-right" style="color:blue;font-size:24px!important;cursor:pointer;"></i></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail">
                    <img src="images/church-family.jpg" alt="Cloves Junior Dev">
                    <div class="caption">
                     <h2 style="color:black;text-shadow: none!important; ">Loren Ipsun.</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ullamcorper eu dui in efficitur. Quisque vehicula malesuada enim, sit amet pharetra nunc placerat eu. Nam vulputate in lectus id ultricies. Cras porttitor placerat scelerisque. Maecenas lacinia vestibulum eleifend. Mauris a enim accumsan odio vehicula suscipit a id leo. Phasellus erat lectus, scelerisque sit amet diam vel, posuere venenatis sapien. Duis suscipit elit quis magna suscipit facilisis. Nunc fermentum metus eget velit condimentum sollicitudin. Mauris justo ex, rutrum non posuere quis, fermentum quis diam. Integer varius commodo metus, sed sollicitudin justo convallis id. Cras vestibulum molestie augue fermentum malesuada.</p>

                      <p>Ut euismod nec erat vel faucibus. Suspendisse laoreet tincidunt est eu sodales. Nam consequat rhoncus nulla a mattis. Cras viverra nec erat at tincidunt. Proin pulvinar in diam quis tincidunt. Vivamus ornare posuere neque, nec condimentum est vulputate in. Nunc mattis nisi a orci maximus ullamcorper. Sed dapibus vel turpis quis volutpat. Integer eleifend turpis id velit elementum, sed volutpat risus aliquet. Vestibulum porta neque quis consectetur congue. Fusce scelerisque neque vel odio elementum porta. Nam ut diam non velit dictum faucibus.

                        <p>Nam facilisis pretium erat sit amet ultrices. Nullam ac felis ornare, tincidunt est id, molestie tellus. Aenean ut leo congue, fringilla lorem ut, malesuada velit. Aenean rhoncus, velit molestie dictum volutpat, nunc massa euismod est, et bibendum nunc augue ac urna. Maecenas iaculis ut tellus non scelerisque. Quisque egestas, justo ac semper viverra, nisl metus consectetur velit, sed bibendum dui lacus sed enim. Fusce id nunc vel odio eleifend ullamcorper. Nunc malesuada, elit et porta consequat, ex justo feugiat arcu, vitae dignissim nibh nunc sed metus. Proin sed neque vitae nibh hendrerit viverra. Nulla facilisi. Phasellus dolor magna, accumsan a pellentesque quis, feugiat eu sapien. Nulla aliquet purus et mauris viverra porta. Sed ut ante cursus, sagittis ligula lacinia, varius ex. Curabitur vitae fermentum elit. Aenean ac nulla sed risus tincidunt tincidunt.</p>
                      <p><i class="glyphicon glyphicon-thumbs-up pull-right" style="color:blue;font-size:24px!important;cursor:pointer;"></i></p>
                    </div>
                </div>
            </div>
        </div>


            </div>
        </section>
        <!--<section id="team">
        <div class="container ">

            <div class="row">
                <div class="text-center">
                    <h2 class="team-text" id="t"><strong>Nosso Time!</strong></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                    <div class="team-member">
                        <img src="images/team/cloves.jpg" class="img-responsive img-circle" alt="">
                        <h4 class="text-center team-text"><strong>Cloves Júnior</strong></h4>
                        <p class="text-muted text-center team-text">Hacker</p>
                    </div>
                </div>


                <div class="col-lg-2 col-lg-offset-0 col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                    <div class="team-member">
                        <img src="images/team/kaic.jpg" class="img-responsive img-circle" alt="">
                        <h4 class="text-center team-text"><strong>Kaic Bento</strong></h4>
                        <p class="text-muted text-center team-text">Hacker</p>
                    </div>
                </div>

                <div class="col-lg-2 col-lg-offset-0 col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                    <div class="team-member">
                        <img src="images/team/henrique.png" class="img-responsive img-circle" alt="">
                        <h4 class="text-center team-text"><strong>Henrique Brun </strong></h4>
                        <p class="text-muted text-center team-text">Hacker</p>
                    </div>
                </div>
                <div class="col-lg-2 col-lg-offset-0 col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                    <div class="team-member">
                        <img src="images/team/luciano.png" class="img-responsive img-circle" alt="">
                        <h4 class="text-center team-text"><strong>Luciano </strong></h4>
                        <p class="text-muted text-center team-text">Hipster</p>
                    </div>
                </div>
                <div class="col-lg-2 col-lg-offset-0 col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                    <div class="team-member">
                        <img src="images/team/leo.png" class="img-responsive img-circle" alt="">
                        <h4 class="text-center team-text"><strong>Leonardo Marassi</strong></h4>
                        <p class="text-muted text-center team-text">Hyper</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                    <div class="team-member">
                        <img src="images/team/pedro.png" class="img-responsive img-circle" alt="">
                        <h4 class="text-center team-text"><strong>Pedro Arruda</strong></h4>
                        <p class="text-muted text-center team-text">Hyper</p>
                    </div>
                </div>

                <div class="col-lg-2 col-lg-offset-0 col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                    <div class="team-member">
                        <img src="images/team/bianca.png" class="img-responsive img-circle" alt="">
                        <h4 class="text-center team-text"><strong>Bianca Renó</strong></h4>
                        <p class="text-muted text-center team-text">Hustler</p>
                    </div>
                </div>
                <div class="col-lg-2 col-lg-offset-0 col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                    <div class="team-member">
                        <img src="images/team/deise.png" class="img-responsive img-circle" alt="">
                        <h4 class="text-center team-text"><strong>Deise Souza</strong></h4>
                        <p class="text-muted text-center team-text">Hustler</p>
                    </div>
                </div>

                <div class="col-lg-2 col-lg-offset-0 col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2">
                    <div class="team-member">
                        <img src="images/team/pietro.png" class="img-responsive img-circle" alt="">
                        <h4 class="text-center team-text"><strong>Pietro Semeraro</strong></h4>
                        <p class="text-muted text-center team-text">Hustler</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted team-text">
Somos uma equipe especializada no desenvolvimento de conteúdos e cursos para profissionais da área de vendas e comércio. Estamos conectados com as melhores universidades e empresas ao redor do mundo, reunindo as melhores práticas para compartilhar com nossos parceiros.

Nosso objetivo é criar valor para nossos leitores através de novidades, pesquisas e dicas diferenciais em sua profissão na área de vendas. E assim, se tornar referência no assunto.
</p><p class="large text-muted team-text">
Esperamos que goste.

Um grande abraço da nossa equipe, e boas vendas!</p>
                </div>
            </div>
        </div>
    </section>-->



        <section id="contato">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 id="t"><strong>Contato</strong></h2>
                    <hr class="primary">
                    <p></p>
                </div>
                <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:your-email@your-domain.com">newprogsoftwares@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container">
                <div class="text-center wow fadeInUp" style="font-size: 14px;">Todos os direitos reservados para <a>Price Spy</a></div>
                <a href="#" class="scrollToTop"><i class="pe-7s-up-arrow pe-va"></i></a>
            </div>
    </footer>

        <!-- /.javascript files -->
        <script src="js/custom.js"></script>
        <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/home.js"></script>
        <script>
            new WOW().init();
        </script>
         <!--Analytics-->
    <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-84385016-1', 'auto');
          ga('send', 'pageview');
    </script>
  </body>

@endsection
