(function() {
	'use strict';
	$('#tipo').on('change', montarDivMidia);
	
	function montarDivMidia(event) {
		var $el = $(event.target);
		
		var html = "";
		
		switch($el.val()) {
			case 'video':
				
			break;
			case 'audio':
			break;
			case 'imagem':
				var input = $('<input/>').attr({'type': 'file','name':'imagem'});
				console.log(input);
				return;
				$('#midia').html(input);
			break;
		}
	}
	
	
})();