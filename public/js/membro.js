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
    	var idCampoAtual;// Variavel de controle.
    	try {	    	
    		//INI - Validações campos de membros
    		event.preventDefault();
	        //CPF
	        var cpf = $("#cpf").val().replace(/\.|\-/gi, '');
    		idCampoAtual = $("#cpf");
    		if (validarCPF(cpf) == false) throw "CPF Inválido!";
    		$("#cpf").val(cpf);

    		// CEP
    		var cep = $("#cep").val().replace('-', '');
	        if (cep == '' || cep.length != 8 ) throw "CEP Inválido";
	        $("#cep").val(cep);
	        
	        
	    	var data = $("#dt_nasc").val();
	        data = data.split('/');

	        $("#data_nasc").val(data[2]+"-"+data[1]+"-"+data[0]);

	        $('form').submit();

    	} catch ($e) {	
    		idCampoAtual.focus();
    		alert($e);
    	}

    }); 

    $("#cpf").mask('000.000.000-00', {reverse: true});
    $("#dt_nasc").mask('00/00/0000', {reverse: true});
    $("#telefone").mask('(00)0000-0000', {reverse: false});
    $("#celular").mask('(00)00000-0000', {reverse: false});
    $("#cep").mask('00000-000', {reverse: false});
    $('#email').mask("A", {
        translation: {
            "A": { pattern: /[\w@\-.+]/, recursive: true }
        }
    });
	
	function validarCPF(strCPF) {
	    var Soma;
	    var Resto;
	    Soma = 0;
		if (strCPF == "00000000000") return false;
	    
		for (var i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
		Resto = (Soma * 10) % 11;
		
	    if ((Resto == 10) || (Resto == 11))  Resto = 0;
	    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
		
		Soma = 0;
	    for (var i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
	    Resto = (Soma * 10) % 11;
		
	    if ((Resto == 10) || (Resto == 11))  Resto = 0;
	    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
	    return true;
	}
})();




