@extends('layouts.dashboard.layout')

@section('conteudo')
    <div class="row mtbox">

        <div class="col-md-2 col-sm-1 col-md-offset-2 box0"> 
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

      </div>
      <!-- /row mt -->
            
  <!--main content start-->
    <section class="dashboard-dados wrapper site-min-height">
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
                        <h4><i class="fa fa-angle-right"></i> Mapa de reuniões pendentes</h4>
                        <div class="panel-body">
                             <div class="map" id="map">
                                <!--  <img src="http://cdn.newsapi.com.au/image/v1/0a0ceda4bda18e664ffac1a8fa86a7d1">-->
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
 <!--  <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="dashboard_layout/js/jquery.js"></script>
    <script src="dashboard_layout/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="dashboard_layout/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="dashboard_layout/js/jquery.scrollTo.min.js"></script>
    <script src="dashboard_layout/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>



    <!--script for this page-->
    <script src="dashboard_layout/js/graficos-dashboard.js"></script>
    <script src="dashboard_layout/js/common-scripts.js"></script>
	<script type="text/javascript" src="js/mapa.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo5xFM5H--dG9scIUhTmeT8d_Ut4C4-uo&callback=initMap"></script>

 
<script type="text/javascript">

ultimosMemrosAdd();
pedidosDeOracao();

$(function(){
    $('select.styled').customSelect();
});


function ultimosMemrosAdd(){
	request('/api/membros/ultimos', null, 'GET')
	.done(function(response) {
		var membro = "";
	
		for(var i in response) {
			var sexo = response[i].sexo == 'm' ? 'Masculino' : 'Feminino';
			var endereco = response[i].logradouro + ' '+ response[i].numero + ' - ' + response[i].bairro
			  membro += "<div class='membro-card'>";
			  membro += "<div class='foto'><img src='/dashboard_layout/img/ui-sam.jpg' class='img-circle' width='60'></div>";
			  membro += "<div class='membro-descricao'>";
			  membro += "  <div class='nome'>"+response[i].nome+"</div>";
			  membro += "  <div class='idade'>"+response[i].dt_nasc+"</div>";
			  membro += "  <div class='telefone'>"+response[i].telefone+"</div>";
			  membro += "  <div class='sexo'>"+sexo+"</div>";
			  membro += "  <div class='endereco'>"+endereco+"</div>";
			  membro += "</div>";
			  membro += "</div>";

		}
		  $("#ultimos-membros").html(membro);
	
	})
	.fail(function(response) {
		console.log("ERRO AO CARREGAR A LISTA DE PEDIDOS DE ORAÇÃO - ", response);
	});
}

function pedidosDeOracao(){
	request('/api/mensagem', null, 'GET')
	.done(function(response) {
		var pedido = "";

		for(var i in response) {
			  pedido += "<div class='membro-card'>";
			  pedido += "<div class='foto'><img src='/dashboard_layout/img/ui-sam.jpg' class='img-circle' width='60'></div>";
			  pedido += "<div class='pedido-oracao'>";
			  pedido += "  <div class='pedido-membro'><strong>Nome: </strong>"+response[i].nome+"</div>";
			  pedido += "  <div class='pedido-membro'><strong>E-Mail: </strong>"+response[i].email+"</div>";
			  pedido += "  <div class='pedido-membro'><strong>Telefone: </strong>"+response[i].telefone+"</div>";
			  pedido += "  <div class='pedido-descricao'><strong>Descrição: </strong>"+response[i].descricao+"</div>";
			  //pedido += "  <div class='pedido-descricao'>Pastor, boa tarde. Venho pedir oração para mim pois estou sentidno fortes dores nas costas durante a semana. Já fui ao médico e nada foi identificado, tenho fé que só Deus pode me curar. Peço que apresente o pedido de oração a igreja no proximo culto.</div>";
			  pedido += "</div>";
			  pedido += "</div>";
		}
		$("#pedidos-de-oracao").html(pedido);

	})
	.fail(function(response) {
		console.log("ERRO AO CARREGAR A LISTA DE PEDIDOS DE ORAÇÃO - ", response);
	});
}
</script>

@stop
