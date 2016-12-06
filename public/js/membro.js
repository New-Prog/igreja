

obj_list_membros = {};

function gravarPost() {

	// if($('#autor').val() == '') {
	// 	alert('Preencha o autor corretamente');
	// 	$('#autor').focus();
	// 	return false;
	// }

	// if($('#titulo').val().lenth < 5) {
	// 	alert('Preencha o titulo corretamente');
	// 	$('#titulo').focus();
	// 	return false;
	// }

	// if($('#descricao').val().lenth < 5) {
	// 	alert('Preencha a descricao corretamente');
	// 	$('#descricao').focus();
	// 	return false;
	// }

	var data = {
		id                     : $("#id").val(),
		membro_cpf             : $("#membro_cpf").val(),
		membro_nome            : $("#membro_nome").val(),
		membro_sobrenome       : $("#membro_sobrenome").val(),
		membro_rg              : $("#membro_rg").val(),
		membro_data_nascimento : $("#membro_data_nascimento").val(),
		membro_cep             : $("#membro_cep").val(),
		membro_endereco        : $("#membro_endereco").val(),
		membro_telefone_1      : $("#membro_telefone_1").val(),
		membro_telefone_2      : $("#membro_telefone_2").val(),
		membro_id_celula       : $("#membro_id_celula").val(),
		membro_tipo            : $("#membro_tipo").val(),
		_token                 : $('#_token').val()

		// autor: $('#membro_').val(),
		// titulo: $('#titulo').val(),
		// descricao:$('#descricao').val(),
	};


	link = '/membros/save';

	if ($('#deonde').val() == 'alterado') {
		link = "/membros/update";
	} 

	console.log('data: ', data);

	$.post(link, data, function(data) {
		if(data.OK) {

	  		swal({   title: "OK!",   text: "Membro "+ $('#deonde').val() +" com sucesso!",   type: "success",   confirmButtonText: "OK" });
	  		$('.close').trigger('click');

	  	} else {
	  		swal({   title: "Erro!",   text: data.error,   type: "error",   confirmButtonText: "OK" });
	  	}
	  	$('#autor, #titulo, #descricao').val("");
	}, 'json');
}

$('#cadastrar').on('click', function() {
	gravarPost();
});

function requestServer(dados) {
    
    var  url = dados.url;
    var  type = dados.type;
    var  data = dados.data;

	return $.ajax({
		url: url,
		type: type,
		data: data,
		dataType: 'json',
		timeout: 5000,
		async: false,
		error: function(response) {
			console.log(response, 'ERRO AJAX  ');
		},
		success: function(resp) {
            console.log(resp);
			return resp;
		}
	});
}   
function montarListaMembros(data) {
    var html='';
	obj_list_membros = data;

	console.log("Lista de membros: ", obj_list_membros);
	count = 0;
    for(var i in data) { 
        html += "<tr id=" + data[i].id + " data-data="+ data[i] +" >" +
                "   <td>" + data[i].membro_nome +" "+  data[i].membro_sobrenome + "</td>" +
                "   <td>" + data[i].membro_cpf + "</td>" +
                "   <td>" + data[i].membro_id_celula + "</td>" +
                "   <td class='text-center'><span onclick=\"javascript: alterarMembro("+count+")\" style='cursor:pointer' class='glyphicon glyphicon-search' data-toggle='modal' data-target='#myModal'></span></td>" +

                "</tr>";

    	count++;
    }

    $("#retorno").removeClass("hidden");
    $("#retorno tbody").html(html);
} 

$("#pesquisar").on('click',function() {
    var dados = {
        url : '/listarMembros', 
        type : 'GET', 
        data : {
            tipo_pesquisa: $("select[name='tipo_pesquisa']:checked").val(), 
            conteudo_pesquisa: $("input[name='conteudo_pesquisa']").val()
       },
    }

	var response = JSON.parse(requestServer(dados).responseText);
    console.log(response);
	montarListaMembros(response);
});
acoes_cad_modal = function() {

	// LIMPA TODAS AS INPUTS DA TELA 
	$("#deonde").val('cadastrado');
	$("#id").val('');
	$("[id^=membro_]").val("");
};

function alterarMembro(id_linha) {
	// PREENCHENDO DADOS DA TELA CONFORME VIR DO BD
	
	$("#deonde").val('alterado');

	$("#id").val(obj_list_membros[id_linha].id);
	$("#membro_cpf").val(obj_list_membros[id_linha].membro_cpf);
	$("#membro_nome").val(obj_list_membros[id_linha].membro_nome);
	$("#membro_sobrenome").val(obj_list_membros[id_linha].membro_sobrenome);
	$("#membro_rg").val(obj_list_membros[id_linha].membro_rg);
	$("#membro_data_nascimento").val(obj_list_membros[id_linha].membro_data_nascimento);
	$("#membro_cep").val(obj_list_membros[id_linha].membro_cep);
	$("#membro_endereco").val(obj_list_membros[id_linha].membro_endereco);
	$("#membro_telefone_1").val(obj_list_membros[id_linha].membro_telefone_1);
	$("#membro_telefone_2").val(obj_list_membros[id_linha].membro_telefone_2);
	$("#membro_id_celula").val(obj_list_membros[id_linha].membro_id_celula);
	$("#membro_tipo").val(obj_list_membros[id_linha].membro_tipo);

}


$("select").on('change', function() {
    var _this = $(this); 
    if (_this.val() != 'todos') {
        $('.escondido').css('display', 'block');
    } else {
        $('.escondido').css('display', 'none');
        $('.escondido input').val('');
    }
});