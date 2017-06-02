@extends('layouts.dashboard.layout')
@section('conteudo')
<link rel="stylesheet" href="/bower_components/sweetalert2/dist/sweetalert2.min.css">
<div class="row mt">
	<div class="col-md-12">
		<div class="content-panel">
			<table class="table table-striped table-advance table-hover">
				<input type="hidden" id="fk_reuniao" value="{{$fk_reuniao}}">
				<h4>
					<i class="fa fa-angle-right"></i> Lista de presença </h4>
					<a class="btn_link pull-rigth" href="/reunioes/consultar" alt="reunioes"><button class="btn btn-info btn-xs">Voltar</button></a>

				<hr>
				<thead>
					<tr>
						<th><i class="fa fa-bullhorn"></i> Reunião</th>
						<th class="hidden-phone"><i class="fa fa-question-circle"></i>
							Membro</th>
						<th>Presente</th>
					</tr>
				</thead>
				<tbody>
					@foreach($presencas as $presenca)

					<tr>


						<td>{{ $presenca['reuniao']['tema'] }}</td>
						<td class="">{{ $presenca['membro']['nome'] }}</td>
						<td>
							<input {{ ($presenca['presente'] == true ) ? 'checked' : ''}} type="radio" class="btn-radio" name="presenca_{{$presenca['fk_membro']}}" value="1"> Sim
							<input {{ ($presenca['presente'] == false) ? 'checked' : ''}} type="radio" class="btn-radio" name="presenca_{{$presenca['fk_membro']}}" value="0"> Não
							<button type="button" class="btn envio" data-val="{{$presenca['fk_membro']}}">Enviar</button>
						</td>

					</tr>
					@endforeach


				</tbody>
			</table>
		</div>
		<!-- /content-panel -->
	</div>
	<!-- /col-md-12 -->
</div>
<!-- /row -->
<script src="/bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
<script type="text/javascript">

(function () {
	'use_strict';

	var id_reuniao = $("[type='hidden'][id='fk_reuniao']").val();

	function request(url, data, type) {
		return $.ajax({
			url: url,
			type: type,
			dataType: 'json',
			data: data,
			timeout: 100000
		});
	}

	var enviarPresenca = function (id_membro, presente) {
		var url = "/presencas/up/";
		var msg_retorno;
		var type;
		var title;

		request(url, {
				'fk_reuniao': id_reuniao,
				'fk_membro': id_membro,
				'presente': presente
			}, 'POST')
			.done(function() {
				if(presente == true) {
					msg_retorno = 'Membro Confirmado!';
					type = 'success';
					title = 'Sucesso';
				} else {
					msg_retorno = 'Membro não pode comparecer';
					type = 'warning';
					title = 'Opss!';
				}

	            swal({
	                type: type,
	                text: msg_retorno,
	                title: title
	            });
			})
			.fail(function(data) {
				console.warn(data);
// 				alert(data.response);
			});
	}

	$(".envio").on('click', function () {
		var fk_membro = $(this).data('val');
		var presente = $(this).closest('td').find('input:checked').val();
		enviarPresenca(fk_membro, presente);

	});


})();


</script>


@stop