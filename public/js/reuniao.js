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

    $('#btn-preencher').on('click', preencherMagicamente);

    function preencherMagicamente(event) {
        $('#tema').val("Louvar o senhor");
        $('#descricao').val("Reunião minitrada para louvar o senhor");
        $('#data').val("29/06/2017");
        $('#cpf').val("425.912.388-20");
        $('#cep').val('01009-000').trigger('blur');
        $('#numero').val('377');
    }


    $("#btn_enviar").on('click', function (event) {

    	event.preventDefault();

        $("#cep").val($("#cep").val().replace('-', ''));

        var data = $("#data").val().split('/');

        $("#data").val(data[2]+"-"+data[1]+"-"+data[0]);

        if($('#fk_celula').val().trim() == "") {
            swal({
                type: 'warning',
                text: 'Selecione uma célula',
                title: "Opss!"
            });

            return;
        }

        $('form').submit();
    });

    $("#data").mask('00/00/0000', {reverse: false});
    $("#telefone").mask('(00)0000-0000', {reverse: false});
    $("#celular").mask('(00)00000-0000', {reverse: false});
    $("#cep").mask('00000-000', {reverse: false});
});
