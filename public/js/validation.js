var validator = {
email: /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/,
nome: /[a-zA-z]/,
telefone: /^[1-9]{2}\-[2-9][0-9]{7,8}$/
};


$('#btnEnviar').on('click', function() {
enviar();
});


function enviar() {

if($('#nome').val().length < 6 ) {
alert('Preencha o nome corretamente');
$('#nome').focus();return false;
}
if(validator.telefone.test($('#telefone').val()) === false)  {
alert('Preencha corretamento o campo telefone');
$('#telefone').focus();return false;
}
if(validator.email.test($('#email').val()) === false) {
alert('Preencha corretamento o campo Email');
$('#email').focus();return false;
}

var dataEnv = {
nome: $('#nome').val(),
telefone: $('#telefone').val(),
email: $('#email').val()
}

$.post( "/teste", dataEnv, function( data ) {
 console.log( data );

}, "json");
}
