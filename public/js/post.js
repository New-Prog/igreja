(function() {

	'use strict';
	$('#tipo').on('change', montarDivMidia);

	$('#btn-enviar').on('click', enviar);
	$('#btn-preencher').on('click', preencher);

	function preencher(){
		var now = new Date();
		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

		$('#nome').val("Festa do Branco");
		$('#tipo option[value=imagem]').attr('selected',true);
		$('#data').val(today);
		$('#descricao').val("Uma festa sem nada de mais");
		$('#link').val("https://www.youtube.com/watch?v=EcJHFK38heM");
		var input = $('<input/>').attr({'type': 'file','name':'imagem', 'id': 'imagem'});
		$('#midia').html(input);


	}

	function enviar(e) {

		if($('#tipo').val() == "" || $('#nome').val() == "" || $('#descricao').val() == "") {
			alert("Preencha todos os campos");
			return;
		} else if($('#tipo').val() == "imagem" && $('#imagem').val() == "") {
			alert("Selecione uma imagem");
			return;
		}

		$('#form').submit();
		console.log("xxx");
	}

	function montarDivMidia(event) {
		var $el = $(event.target);

		switch($el.val()) {
			case 'video':
			case 'audio':
				$('#midia').html("");
			break;
			case 'imagem':

				var input = $('<input/>').attr({'type': 'file','name':'imagem'});
				$('#midia').html(input);
			break;
		}
	}


	$('#tipo').trigger('change');


})();
