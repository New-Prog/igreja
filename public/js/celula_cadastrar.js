(function() {
	
	'use strict';
	$('#btn-limpar').on('click', limparCampos);
	
	function limparCampos(event) {
		$('input[name=nome]').val("");
		$('select[name=lider]').val("");
	}
	
    $(document).on('click', ".btn-danger" , function( event ) {
        event.stopImmediatePropagation();
        $('#conteudo-principal').load("/celulas/consultar");
        return false;
    });

})();
	
