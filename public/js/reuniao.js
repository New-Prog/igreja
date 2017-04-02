$(document).ready(function ($) {

    $('#cep').on('blur', function (data) {
        $.get( "http://api.postmon.com.br/v1/cep/"+$(this).val(), function(data) {
            $('#bairro').val(data.bairro); 
            $('#cidade').val(data.cidade);
            $('#estado').val(data.estado);
            $('#logradouro').val(data.logradouro);

        });
    });
    $(document).on('click', ".btn-danger" , function( event ) {
        event.stopImmediatePropagation();
        $('#conteudo-principal').load("/reunioes/consultar");
        return false;
    });

    $('#btn_limpar').on('click', function() {
        $('input').val('');
        $('select').val('');
    });
    
    $("#btn_enviar").on('click', function (event) {
    	
    	event.preventDefault();
    	
        $("#cep").val($("#cep").val().replace('-', ''));
        
        var data = $("#data").val();
        data = data.split('/');

        $("#data").val(data[2]+"-"+data[1]+"-"+data[0]);
        
        $('form').submit();

    }); 


    $("#data").mask('00/00/0000', {reverse: false});
    $("#telefone").mask('(00)0000-0000', {reverse: false});
    $("#celular").mask('(00)00000-0000', {reverse: false});
    $("#cep").mask('00000-000', {reverse: false});
});
