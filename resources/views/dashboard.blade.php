@extends('layouts.dashboard.layout')

@section('conteudo')
    <link rel="stylesheet" type="text/css" href="css/float-modal/float-modal.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <div class="row mtbox">

        <div class="col-md-2 col-sm-1 col-md-offset-3 box0">
          <div class="box1">
            <span class="glyphicon glyphicon-user"></span>
            <h3 id="membros_cadastrados_label"></h3>
          </div>
          <p id="membros_cadastrados"></p>
        </div>

        <div class="col-md-2 col-sm-2 box0">
          <div class="box1">
            <span class="glyphicon glyphicon-home"></span>
            <h3 id="reunioes_realizadas_label"></h3>
          </div>
          <p id="reunioes_realizadas"> </p>
        </div>

        <div class="col-md-2 col-sm-2 box0">
          <div class="box1">
            <span class="glyphicon glyphicon-film"></span>
            <h3 id="ultimos_newfeed_label"></h3>
          </div>
          <p id="ultimos_newfeed"></p>
        </div>

      </div>
      <!-- /row mt -->

  <!--main content start-->
    <section class="dashboard-dados wrapper site-min-height">
        <!-- page start-->

        <div id="morris">
            <div class="row mt">
                <div class="col-lg-6">
                    <div class="content-panel box-dashboard float-modal" id="float-modal-0">
                        <h4><i class="fa fa-angle-right"></i> Membros por célula nos últimos 7 dias
                            <button type="button" data-float-modal="#float-modal-0" class="btn btn-default pull-right">
                                <i class="glyphicon glyphicon-resize-full"></i>
                            </button>
                        </h4>
                        <div class="panel-body">
                            <div id="membros-celulas" class="graph" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" >
                    <div class="content-panel box-dashboard float-modal" id="float-modal-1">

                        <h4>
                            <i class="fa fa-angle-right"></i> Ultimos Membros adicionados
                            <button type="button" data-float-modal="#float-modal-1" class="btn btn-default pull-right">
                                <i class="glyphicon glyphicon-resize-full"></i>
                            </button>
                        </h4>

                        <div class="panel-body">
                            <div id="ultimos-membros"></div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row mt">
                <div class="col-lg-6">
                    <div class="content-panel box-dashboard float-modal" id="float-modal-2">
                        <h4><i class="fa fa-angle-right"></i> Pedidos de oração
                            <button type="button" data-float-modal="#float-modal-2" class="btn btn-default pull-right">
                                <i class="glyphicon glyphicon-resize-full"></i>
                            </button>
                        </h4>
                        <div id="pedidos-de-oracao" class=""></div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="content-panel box-dashboard float-modal" id="float-modal-3" style="overflow-y: hidden!important;">
                        <h4><i class="fa fa-angle-right"></i> Mapa de reuniões pendentes
                            <button type="button" data-float-modal="#float-modal-3" class="btn btn-default pull-right">
                                <i class="glyphicon glyphicon-resize-full"></i>
                            </button>
                        </h4>
                        <div class="panel-body">
                             <div class="map" id="map"></div>
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
    <script type="text/javascript" src="js/float-modal/float-modal.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo5xFM5H--dG9scIUhTmeT8d_Ut4C4-uo&callback=initMap"></script>


<script type="text/javascript">

ultimosMemrosAdd();
pedidosDeOracao();
preencheDados();


function preencheDados() {

	request('/api/dashboard/getdados', null, 'GET')
	.done(function(response) {
		$('#membros_cadastrados').html(response.qtd_membros_ult_sete_dias + " Membros novos cadastrados");
		$('#reunioes_realizadas').html(response.qtd_reunioes_ult_sete_dias+ " Reuniões de células foram realizadas");
		$('#ultimos_newfeed').html("Foram postados "+response.qtd_posts_ult_sete_dias + " artigos no News Feed");
		$('#membros_cadastrados_label').html("+" + response.qtd_membros_ult_sete_dias);
		$('#reunioes_realizadas_label').html(response.qtd_reunioes_ult_sete_dias);
		$('#ultimos_newfeed_label').html("+"+response.qtd_posts_ult_sete_dias);

		var celulas = [];

		for(var i in response.celula) {
            if(response.celula[i].qtd_membro == 0) {
                continue;
            }
			celulas.push({celula: response.celula[i].nome, quantidade: response.celula[i].qtd_membro});
		}
        $('#membros-celulas').html("");
        console.log(celulas);
		Morris.Bar({
			element: 'membros-celulas',
			data: celulas,
			xkey: 'celula',
			ykeys: ['quantidade'],
			labels: ['Quantidade de membros'],
			hideHover: 'auto',
		});


	})
	.fail(function(response) {
		console.log("ERRO AO CARREGAR A LISTA DE PEDIDOS DE ORAÇÃO - ", response);
	});
}

function ultimosMemrosAdd() {
	request('/api/membros/ultimos', null, 'GET')
	.done(function(response) {
		var membro = "";

		for(var i in response) {
			var sexo = response[i].sexo == 'm' ? 'Masculino' : 'Feminino';
			var endereco = response[i].logradouro + ' '+ response[i].numero + ' - ' + response[i].bairro
			  membro += "<div class='col-md-12 membro-card'>";
			  membro += "<div class='foto'><img src='/dashboard_layout/img/ui-sam.jpg' class='img-circle' width='60'></div>";
			  membro += "<div class='membro-descricao'>";
			  membro += "  <div class='nome'>"+response[i].nome+"</div>";
			  membro += "  <div class='idade'>"+response[i].dt_nasc+"</div>";
			  membro += "  <div class='telefone'>"+response[i].telefone+"</div>";
			  //membro += "  <div class='sexo'>"+sexo+"</div>";
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
			  pedido += "<div class='col-md-12 membro-card'>";
			  pedido += "<div class='foto'><img src='/dashboard_layout/img/ui-sam.jpg' class='img-circle' width='50'></div>";
			  pedido += "<div class='pedido-oracao'>";
			  pedido += "  <div class='pedido-membro'><strong>Nome: </strong>"+response[i].nome+"</div>";
			  pedido += "  <div class='pedido-membro'><strong>E-Mail: </strong>"+response[i].email+"</div>";
			  pedido += "  <div class='pedido-membro'><strong>Telefone: </strong>"+response[i].telefone+"</div>";
			  pedido += "  <div class='pedido-descricao'><strong>Descrição: </strong>"+response[i].descricao+"</div>";
			  //pedido += "  <div class='pedido-descricao'>Pastor, boa tarde. Venho pedir oração para mim pois estou sentidno fortes dores nas costas durante a semana. Já fui ao médico e nada foi identificado, tenho fé que só Deus pode me curar. Peço que apresente o pedido de oração a igreja no proximo culto.</div>";
			  pedido += "</div>";
              pedido += "<span class='pull-right' style='line-height:96px;'><button class='btn btn-link btn-finalizar-oracao' >Finalizar pedido de oração</button></span>";
			  pedido += "</div>";
		}
		$("#pedidos-de-oracao").html(pedido);

        $('.btn-finalizar-oracao').off('click').on('click', function(e) {
            removeLinhaOracao(e, this);
        })

	})
	.fail(function(response) {
		console.log("ERRO AO CARREGAR A LISTA DE PEDIDOS DE ORAÇÃO - ", response);
	});
}
function removeLinhaOracao(e, element) {
    $(element).closest('.membro-card').remove();
}
</script>

@stop
