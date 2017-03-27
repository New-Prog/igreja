@extends('layouts.dashboard.layout')

@section('conteudo')
<h4><i class="fa fa-angle-right"></i> Resumo Semanal</h4>

    <div class="row mtbox">

        <div class="col-md-2 col-sm-1 col-md-offset-1 box0"> 
          <div class="box1">
            <span class="glyphicon glyphicon-user"></span>
            <h3>+83</h3>
          </div>
          <p>83 Membros novos cadastrados</p>
        </div>

        <div class="col-md-2 col-sm-2 box0">
          <div class="box1">
            <span class="glyphicon glyphicon-home"></span>
            <h3>48</h3>
          </div>
          <p>48 Reuniões de células foram realizadas</p>
        </div>


        <div class="col-md-2 col-sm-2 box0">
          <div class="box1">
            <span class="glyphicon glyphicon-book"></span>
            <h3>123</h3>
          </div>
          <p>123 Membros frequentaram reuniões de células</p>
        </div>
        
        <div class="col-md-2 col-sm-2 box0">  
          <div class="box1">
            <span class="glyphicon glyphicon-film"></span>
            <h3>+10</h3>
          </div>
          <p>Foram postados 10 artigos no News Feed</p>
        </div>
        
        <div class="col-md-2 col-sm-2 box0">
          <div class="box1">
            <span class="glyphicon glyphicon-heart"></span>
            <h3>7</h3>
          </div>
          <p>7 novos eventos ocorreram</p>
        </div>

      </div><!-- /row mt -->

      
  <!--main content start-->
    <section class="dashboard-dados wrapper site-min-height">
    <h3><i class="fa fa-angle-right"></i> Dados</h3>
        <!-- page start-->
        <div id="morris">
            <div class="row mt">
                <div class="col-lg-6">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Quantidade de membros por célula</h4>
                        <div class="panel-body">
                            <div id="membros-celulas" class="graph"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Ultmos Membros adicionados</h4>
                        <div class="panel-body">
                            <div id="ultimos-membros" class=""></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt">
                <div class="col-lg-6">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Pedidos de oração</h4>
                        <div class="panel-body">
                            <div id="pedidos-de-oracao" class=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Mapa dos membros</h4>
                        <div class="panel-body">
                             <div class="map">
                                <img src="http://cdn.newsapi.com.au/image/v1/0a0ceda4bda18e664ffac1a8fa86a7d1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page end-->

        <div id="zoom-principal" class="zoom-principal">
            <div class="principal-conteudo">
            </div>
        </div>
    </section>

    

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="dashboard_layout/js/jquery.js"></script>
    <script src="dashboard_layout/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="dashboard_layout/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="dashboard_layout/js/jquery.scrollTo.min.js"></script>
    <script src="dashboard_layout/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="dashboard_layout/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="dashboard_layout/js/graficos-dashboard.js"></script>
    
  <script>
  ultimosMemrosAdd();
  pedidosDeOracao();
      //custom select box
      $(function(){
          $('select.styled').customSelect();
      });

      function ultimosMemrosAdd(){
        var membro = "";
        membro += "<div class='membro-card'>";
        membro += "<div class='foto'><img src='/dashboard_layout/img/ui-sam.jpg' class='img-circle' width='60'></div>";
        membro += "<div class='membro-descricao'>";
        membro += "  <div class='nome'>João Doria</div>";
        membro += "  <div class='idade'>33 Anos</div>";
        membro += "  <div class='sexo'>Masculino</div>";
        membro += "  <div class='endereco'>Rua: Aurora Boreal, 123 - Nova Belem</div>";
        membro += "</div>";
        membro += "</div>";


        ultimosMembros = membro;
        ultimosMembros += membro;
        ultimosMembros += membro;
        $("#ultimos-membros").html(ultimosMembros);
      }

      function pedidosDeOracao(){
        var pedido = "";
        pedido += "<div class='membro-card'>";
        pedido += "<div class='foto'><img src='/dashboard_layout/img/ui-sam.jpg' class='img-circle' width='60'></div>";
        pedido += "<div class='pedido-oracao'>";
        pedido += "  <div class='pedido-membro'>Maria das Dores</div>";
        pedido += "  <div class='pedido-tipo'>Oração por doença</div>";
        pedido += "  <div class='pedido-descricao'>Pastor, boa tarde. Venho pedir oração para mim pois estou sentidno fortes dores nas costas durante a semana. Já fui ao médico e nada foi identificado, tenho fé que só Deus pode me curar. Peço que apresente o pedido de oração a igreja no proximo culto.</div>";
        pedido += "</div>";
        pedido += "</div>";


        pedidos = pedido;
        pedidos += pedido;
        pedidos += pedido;
        $("#pedidos-de-oracao").html(pedidos);
      }
  </script>

@stop