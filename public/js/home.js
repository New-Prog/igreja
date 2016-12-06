var validator = {
	email: /^[-a-zA-Z0-9~!$%^&*_=+}{\'?]+(\.[-a-zA-Z0-9~!$%^&*_=+}{\'?]+)*@([a-zA-Z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/
};


$('#btnEnviar').on('click', function() {
	enviar();
	// alert('xxx');
});


function enviar() {

	if($('#nome').val().length < 6 ) {
		alert('Preencha o nome corretamente');
		$('#nome').focus();return false;
	}
	if($('#empresa').val().length < 5)  {
		alert('Preencha corretamento o campo empresa');
		$('#empresa').focus();return false;
	}
	if($('#cargo').val().length < 5)  {
		alert('Preencha corretamento o campo cargo');
		$('#cargo').focus();return false;
	}
	if(validator.email.test($('#email').val()) === false) {
		alert('Preencha corretamento o campo Email');
		$('#email').focus();return false;
	}

	var dataEnv = {
		nome: $('#nome').val(),
		empresa: $('#empresa').val(),
		cargo: $('#cargo').val(),
		email: $('#email').val(),
		_token: $('#_token').val()
	}

	$.post( "/lead", dataEnv, function( data ) {
	  if(data.OK) {
	  	swal({   title: "OK!",   text: "Você será redirecionado",   type: "success"});
	  	window.location = "https://drive.google.com/open?id=0B5P8ZgTwb6G8V3ZMQldtNm9kb2c";
	  }else {
	  	swal({   title: "Erro!",   text: data.error,   type: "error",   confirmButtonText: "OK" });
	  	console.log(data.error);
	  }
	  $('#email, #empresa, #nome').val("");

	}, "json");
}

