var modal = function (document, window) {
	var modal = {};
	
	// modal.registrar = function() {
	// 	$('.modal').remove();
	// 	var html = "<div class='modal fade bs-example-modal-sm' id='modalRegistrar' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>" +
	// 				 "<div class='modal-dialog modal-sm'>" +
	// 				   "<div class='modal-content'>" +
	// 				     "<div class='modal-header'>" +
	// 				      "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>" +
	// 				        "<span aria-hidden='true'>&times;</span>" +
	// 				      "</button>" +
	// 				        "<h4 class='modal-title' id='myModalLabel'>Confirme o documento</h4>" +
	// 				      "</div>" +
	// 				      "<div class='modal-body'>" + 	
	// 					      "<label>Identificacao do cliente</label>"+
	// 					      "<input type='text' class='form-control' id='documentoCliente'>"+
	// 					      "</div>" +
	// 				      "<div class='modal-footer'>" +
	// 				        "<button type='button' class='btn btn-primary btn-block' id='btnRegistra' >Registrar</button>" +
	// 				      "</div>" +
	// 				    "</div>" +
	// 				  "</div>" +
	// 				"</div>";
	// 	$("body").prepend(html);
		
	// 	$("#modalRegistrar").modal({backdrop: 'static'});
		
	// 	$("#btnRegistra").on('click', function() {
	// 		analisarEmprestimo();
	// 	});
	// }
	modal.alerta = function(titulo, texto){
		var div_alerta = "<div class='modal fade bs-example-modal-sm' id='modalAlerta' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'><div class='modal-dialog modal-sm'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button><h4 class='modal-title' id='myModalLabel'>"+titulo+"</h4></div><div class='modal-body'>"+texto+"</div><div class='modal-footer'><button type='button' class='btn btn-primary' id='btn_ok' >Ok</button></div></div></div></div>";
		$("body").prepend(div_alerta);
		$("#modalAlerta").modal({backdrop: 'static'});
		$("#btn_ok").on('click', function() {
			$("#modalAlerta").modal('hide');
		});
	}
	return modal;
}(document, window);