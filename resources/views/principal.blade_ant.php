@extends('layouts.layout')
@section('content')
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet" media="screen">
<link href="css/css-index.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300`,400,700,900,100italic,300italic,400italic,700italic,900italic" />
<script type="text/javascript" src="js/exit-popup.js"></script>
<script type="text/javascript">
//   bioEp.init({
//     html: '<div id="bio_ep_content">' +
//     '<img src="http://beeker.io/images/posts/2/tag.png" alt="Claim your discount!" />' +
//     '<span>HOLD ON!</span>' +
//     '<span>Click the button below to get a special discount</span>' +
//     '<span>This offer will NOT show again!</span>' +
//       '<a href="#ebook" class="bio_btn">CLAIM YOUR DISCOUNT</a>' +
//     '</div>',
//     css: '#bio_ep {width: 400px; height: 300px; color: #333; background-color: #fafafa; text-align: center;}' +
//     '#bio_ep_content {padding: 24px 0 0 0; font-family: "Titillium Web";}' +
//     '#bio_ep_content span:nth-child(2) {display: block; color: #f21b1b; font-size: 32px; font-weight: 600;}' +
//     '#bio_ep_content span:nth-child(3) {display: block; font-size: 16px;}' +
//     '#bio_ep_content span:nth-child(4) {display: block; margin: -5px 0 0 0; font-size: 16px; font-weight: 600;}' +
//     '.bio_btn {display: inline-block; margin: 18px 0 0 0; padding: 7px; color: #fff; font-size: 14px; font-weight: 600; background-color: #70bb39; border: 1px solid #47ad0b; cursor: pointer; -webkit-appearance: none; -moz-appearance: none; border-radius: 0; text-decoration: none;}',
//     fonts: ['//fonts.googleapis.com/css?family=Titillium+Web:300,400,600'],
//     cookieExp: 0
// });
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
                    <a class="navbar-brand site-name" href="#top"><img src="images/logo2.png" alt="logo"></a>
                  </div>

                  <div id="navbar-scroll" class="collapse navbar-collapse navbar-backyard navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="#team">Nosso Time</a></li>
                        <li><a href="#blog">Blog</a></li>
                        <li><a href="#contato">Contato</a></li>
                    </ul>
                  </div>
            </div>
        </nav>
    </div>
    <section id="ebook">
    <div class="fullscreen landing parallax" style="background-image:url('images/bg.jpg');" data-img-width="2000" data-img-height="1333" data-diff="100">

        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-7" id="cel">

                        <div class="logo wow fadeInDown"> <a href=""><img src="images/logo.png" alt="logo"></a></div>

                            <h1 class="wow fadeInLeft">
                            <strong>Inteligência e pesquisa de preço para a indústria e varejo</strong>
                            </h1>

                        <div class="landing-text wow fadeInUp">
                            <p>Melhore margens, aumente vendas, defina suas estratégias.</p>
                        </div>

                    </div>

                    <div class="col-md-5">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <div class="signup-header wow fadeInUp">
                            <h3 class="form-title text-center"><p><strong>Promoção 24hs.</strong></p> Baixe nosso ebook <strong>"O Guia Prático da Inteligência e Pesquisa de Preço"</strong> e concorra a um mês Grátis de curso no <a href="https://meusucesso.com/">meusucesso.com</a> por tempo limitado!</h3>
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
                                    <input class="form-control input-lg" name="empresa" id="empresa" type="text" placeholder="Empresa" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" name="cargo" id="cargo" type="text" placeholder="Cargo" required>
                                </div>
                                <div class="form-group last">
                                    <button type="button" class="btn btn-warning btn-block btn-lg" id="btnEnviar">Fazer o download agora <i class="glyphicon glyphicon-download"></i></button>
                                </div>
                                <p class="privacy text-center">
                                    <script language="JavaScript">
                        TargetDate = "09/24/2016 12:00 PM"; //verificar PM-AM
                        BackColor = "#00"; // cor do fundo
                        ForeColor = "#ecf0f1"; // cor da letra
                        CountActive = true; //
                        CountStepper = -1; // 1 para aumentar
                        LeadingZero = true;
                        DisplayFormat = "Você tem %%D%% Dia(s), %%H%%:%%M%%:%%S%% horas para baixar nosso Ebook";
                        FinishMessage = "O E-BOOK nao esta mais disponivel!"; // mensagem apos termino
                    </script>
                    <br>
                    <script language="JavaScript" src="js/timer.js"></script>
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
                <h2 id="t"><strong>Blog</strong></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="thumbnail">
                    <img src="images/blog/um.jpg" alt="Cloves Junior Dev">
                    <div class="caption">
                      <h2 style="color:black;text-shadow: none!important; ">As Estratégias Psicológicas de Preços que Todos Estão Usando.</h2>
                      <p>Você com certeza já ouviu falar de Philip Kotler. O Guru do Marketing nos traz muita informação sobre estratégias de preços. Especialmente naqueles momentos que estamos pensando em como posicionar o nosso produto. Algumas que você já deveria conhecer são:</p>
                        <ul>
                            <li>Estratégia Premium.</li>
                            <li>Estratégia de Penetração.</li>
                            <li>Estratégia de Barganha.</li>
                            <li>Estratégia “Bater e Correr”.</li>
                            <li>Estratégia de preços baixos.</li>
                        </ul>
                        <p>Não vou me aprofundar muito nessas estratégias - Você pode ler mais sobre essas e outras no nosso E-book.</p>
                        <p>Vamos falar um pouco das estratégias psicológicas para apresentação dos preços.</p>
                        <p> Por exemplo, para um consumidor R$99 é percebido como significantemente menos do que R$100 mesmo não havendo quase nenhuma diferença. Apesar de haverem críticas a essa estratégia - e até mesmo algumas pesquisas que mostraram que os consumidores de determinados seguimentos não veem com bons olhos esse tipo de posicionamento - muitos continuam adotando devido a sua efetividade.</p>
                        <p> Outro efeito psicológico de preço é o chamado “Ancoramento do Preço”, muito utilizado por vendedores de veículos, ou lojistas. Com essa técnica o vendedor ganha poder de negociação uma vez que consegue prender a atenção do comprador em um preço de etiqueta que representa o valor "referência" do produto. Dessa forma, os valores negociados abaixo desse "valor ancora” serão sempre percebidos como um bom negócio pelo comprador.</p>
                        <p> Você certamente já se deparou com essa ou outras técnica na hora de comprar ou vender. Mas vale lembrar que para essas técnicas serem efetivas é importante estar alinhado com os preços que o mercado pratica.</p>
                        <p> Esteja sempre atento no posicionamento dos concorrentes e trace a sua estratégia alinhada com o seu perfil e o de seus consumidores.</p>
                        <p>Um grande abraço, e boas vendas!</p>
                      <p><i class="glyphicon glyphicon-thumbs-up pull-right" style="color:blue;font-size:24px!important;cursor:pointer;"></i></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="thumbnail">
                    <img src="images/blog/dois.jpg" alt="Cloves Junior Dev">
                    <div class="caption">
                        <h2 style="color:black;text-shadow: none!important; ">O Guia de Supermercado Que Seus Clientes Estão Usando.</h2>
                        <p>Todo varejista quer ser visto como uma opção econômica para seus clientes na atual conjuntura econômica em que vivemos. Seja a estratégia do seu negócio a competição por preços ou a de produtos premium, é importante saber como os clientes te enxergam.</p>
                        <p>Os consumidores estão cada vez mais conectados e informados – e caso você não esteja também, vai ficar para trás. Verificamos um dos guias que mais tem sido usado pelos consumidores na pesquisa por bons preços. O Guia de Supermercado da Proteste - <a href="http://bit.ly/2d2sDuX">http://bit.ly/2d2sDuX</a></p>
                        <p>O guia vem crescendo vertiginosamente em consultas onlines. Se você tem interesse em saber como está o posicionamento da sua empresa, ou se quer simplesmente saber onde é o melhor lugar no seu bairro para comprar os ingredientes para o brigadeiro, eu recomendo você dar uma conferida</p>
                        <p>PS: Se quiser dicas de brigadeiro, mandem um e-mail direcionado para a Deise, ela arrebenta!</p>
                        <p> Um grande abraço da nossa equipe, e boas vendas!</p>
                      <p><i class="glyphicon glyphicon-thumbs-up pull-right" style="color:blue;font-size:24px!important;cursor:pointer;"></i></p>
                    </div>
                </div>
            </div>
        </div>


            </div>
        </section>
        <section id="team">
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
    </section>



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
                    <p><a href="mailto:your-email@your-domain.com">grupoinfoprice@gmail.com</a></p>
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
        <script src="js/timer.js"></script>
        <script src="js/custom.js"></script>
        <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
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
