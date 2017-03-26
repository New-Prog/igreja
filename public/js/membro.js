(function() {
	'use strict';
	
	$('#cep').on('blur', preecherCampos);
	
	function request(url, data, type) {
		
		return $.ajax({
			url: url,
			type: type,
			dataType: 'json',
			data: data,
			timeout: 10000
		});
	}
	
	
	function preecherCampos(event) {
		var cep = $(event.target).val()
		
		var url = "http://api.postmon.com.br/v1/cep/" + cep;
		
		request(url, null, 'GET')
			.done(function(response) {
	            $('#bairro').val(response.bairro);
	            $('#cidade').val(response.cidade);
	            $('#estado').val(response.estado);
	            $('#logradouro').val(response.logradouro);
			})
			.fail(function(response) {
				alert('Ocorreu um erro ao pegar o CEP');
			});
	}
	

    $(document).on('click', ".btn-danger" , function( event ) {
        event.stopImmediatePropagation();
        $('#conteudo-principal').load("/membros/consultar");
        return false;
    });

    $('#btn_limpar').on('click', function() {
        $('input').val('');
        $('select').val('');
    });

    $("#btn_enviar").on('click', function (event) {
        $("#cep").val($("#cep").val().replace('-', ''));
        
        var cpf = $("#cpf").val().replace(/\.|\-/gi, '');

        $("#cpf").val(cpf);
    }); 

    $("#cpf").mask('000.000.000-00', {reverse: true});
    $("#telefone").mask('(00)0000-0000', {reverse: false});
    $("#celular").mask('(00)00000-0000', {reverse: false});
    $("#cep").mask('00000-000', {reverse: false});
    $('#email').mask("A", {
        translation: {
            "A": { pattern: /[\w@\-.+]/, recursive: true }
        }
    });
	
})();




