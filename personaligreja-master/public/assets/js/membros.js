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
    for(var i in data) { 
        html += "<tr id=" + data[i].membro_id + ">" +
                "   <td>" + data[i].membro_nome +" "+  data[i].membro_snome + "</td>" +
                "   <td>" + data[i].membro_cpf + "</td>" +
                "   <td>" + data[i].membro_nome + "</td>" +
                "   <td class='text-center'><span class='glyphicon glyphicon-search'></span></td>" +
                "</tr>";

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

$("select").on('change', function() {
    var _this = $(this); 
    if (_this.val() != 'todos') {
        $('.escondido').css('display', 'block');
    } else {
        $('.escondido').css('display', 'none');
        $('.escondido input').val('');
    }
});

