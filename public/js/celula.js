(function() {
	'use strict';
	$('#btn_pesquisar').on('click', pesquisar);
	$('#filtro').on('change', carregaCampoFiltro);

	function carregaCampoFiltro(event) {
		var valor = $(event.target).val();

		if(valor == 'lider') {
			getLideres();
		} else if(valor == 'nome'){
			mostrarFiltro();
		}else if(valor == 'todos'){
			//pesquisar();
			$('#div_conteudo').html("");
		} else {
			$('#div_conteudo').html("");
		}
	}

	function request(url, data, type) {

		return $.ajax({
			url: url,
			type: type,
			dataType: 'json',
			data: data,
			timeout: 10000
		});
	}

	function pesquisar() {
		if($('#filtro').val() == '') return;

		var data = {
			'type': $('#filtro').val(),
			'content': $('#conteudo').val()
		}
		request('/celulas/get/filter', data, 'GET')
			.done(montarCelulas)
			.fail(function(response) {
				console.log('Erro  - ', response);
			});
	}

	function montarCelulas(response) {

		var html = "";
		for(var i in response) {
			var nome_lider = (!response[i].lider) ? "" : response[i].lider.nome;
            html += "<tr>"+
	            		"<td>"+response[i].nome+"</a></td>"+
	            		"<td class='hidden-phone'>"+nome_lider+"</td>"+
	            		"<td>"+
	            		"<a class='btn_link' href='/celulas/alterar/"+response[i].id+"' alt='alterar'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a>"+
	            		"<a class='btn_link' href='/celulas/del/"+response[i].id+"' alt='deletar' ><button class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button>"+
	            		"</td>"+
            		"</tr>";
		}
		$('#body-table').html(html);
	}

	function getLideres() {
		request('/celulas/get/lideres', null, 'GET')
			.done(montarComboLideres)
			.fail(function(response) {
				console.log('Erro  - ', response);
			});
	}

	function montarComboLideres(response) {
		var html = "<select name='conteudo' id='conteudo' class='form-control'>"+
				   "	<option>-- Selecione --</option>";


		for(var i in response) {
			html += "	<option value='"+response[i].id+"'>"+response[i].nome+"</option>";
		}
		html += "</select>";
		$('#div_conteudo').html(html);
	}

	function mostrarFiltro() {
		var html = "<input type='text' id='conteudo' name='conteudo' class='form-control'>";
		$('#div_conteudo').html(html);
	}

})();