function gravarPost() {
	if($('#autor').val().lenth < 5) {
		alert('Preencha o autor corretamente');
		$('#autor').focus();
		return false;
	}

	if($('#titulo').val().lenth < 5) {
		alert('Preencha o titulo corretamente');
		$('#titulo').focus();
		return false;
	}

	if($('#descricao').val().lenth < 5) {
		alert('Preencha a descricao corretamente');
		$('#descricao').focus();
		return false;
	}

	var data = {
		autor: $('#autor').val(),
		titulo: $('#titulo').val(),
		descricao:$('#descricao').val(),
		_token: $('#_token').val()
	};


	$.post('/post', data, function(data) {
		if(data.OK) {
	  		swal({   title: "OK!",   text: "Post inserido com sucesso!",   type: "success",   confirmButtonText: "OK" });
	  	} else {
	  		swal({   title: "Erro!",   text: data.error,   type: "error",   confirmButtonText: "OK" });
	  	}
	  	$('#autor, #titulo, #descricao').val("");
	}, 'json');
}

$('#cadastrar').on('click', function() {
	gravarPost()
});