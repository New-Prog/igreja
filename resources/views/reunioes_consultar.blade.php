
@extends('layouts.dashboard.layout')

@section('conteudo')

	<div class="row mt">
	    <div class="col-md-12">
	        <div class="content-panel">

	            <div class="row">
	                 <div class="col-sm-4 ">
	                    <div class="form-group">
	                        <select class="form-control" name="filtro" id="filtro">
	                            <option value="">--Buscar por--</option>
	                            <option value="fk_celula">Célula</option>
	                        </select>
	                    </div>
	                </div>
	                <div class="col-sm-4 ">
	                   	<div id="retorno_filtro" class="form-group"></div>
	                </div>
	                <div class="col-sm-2 ">
	                	<button class="btn 	btn-primary btn-block" id="btn_pesquisar">Pesquisar</button>
	                </div>

	            </div>
	        </div>
	    </div>
	</div>

    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                  <h4><i class="fa fa-angle-right"></i> Reuniões <a class="btn_link btn btn-success pull-right" href="/reunioes/cadastrar"> Novo<span class="glyphicon glyphicon-plus"></span></a> </h4>
                  <hr>
                    <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> Celula</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Tema</th>
                        <th><i class="fa fa-bookmark"></i>Data</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody id='retorno'>

                    @foreach($reunioes as $reuniao)
                    	<?php
	                    	$data = explode('-', $reuniao['data']);
	                    	$reuniao['data'] = $data[2]."/".$data[1]."/".$data[0];
                    	?>
                        <tr>
                            <td>{{ $reuniao['celula']['nome'] }}</td>
                            <td class="hidden-phone">{{ $reuniao['tema'] }}</td>
                            <td>{{ $reuniao['data'] }}</td>
                            <td>
                                <a class="btn_link" href="/reunioes/alterar/{{ $reuniao['id'] }}" alt="alterar"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <a class="btn_link" href="/reunioes/del/{{ $reuniao['id'] }}"    alt="deletar"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                <a class="btn_link" href="/presencas/alt/{{ $reuniao['id'] }}"s    alt="lista"><button class="btn btn-info btn-xs"><i class="fa fa-list "></i></button></a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->


<script type="text/javascript">
$(document).ready(function () {
    $("#filtro").on('change', function () {
        var html = '';
    	if ($(this).val() == 'fk_celula') {
            var celulas;
            $.get( "/api/celulas", function(data) {

                celulas = data;

                html = "<select class='form-control' name='conteudo_filtro' id='conteudo_filtro'>";
                html  +=  "<option value=''>--Selecione--</option>";
                for(var i in celulas) {
                    html  +=  "<option value="+celulas[i].id+">"+ celulas[i].nome +"</option>";
                }
                html += "</select>";
                $("#retorno_filtro").html(html);
                //$("#retorno_filtro").closest('div.row').removeClass('hidden');
                //$("#btn_pesquisar").closest('div.row').removeClass('hidden');

            }, 'json');
        } else {
            $("#retorno_filtro").val('').closest('div.row').addClass('hidden');
            $("#btn_pesquisar").closest('div.row').addClass('hidden');
        }
    });
    $("#btn_pesquisar").on('click', function() {
        $.post( "/reunioes/getEspecifico",
            { filtro: $('#filtro').val(), conteudo_filtro: $('#conteudo_filtro').val() },
            function(data) {
                var html  = '';
                reuniao = data;
                for (var i in reuniao) {

                    date = reuniao[i].data.split('-');
                    data_atual = date[2]+"/"+date[1]+"/"+date[0];

                	html += "<tr style='cursor:pointer'>"
                                +"<td> "+reuniao[i].celula.nome+"</td>"
                                +"<td class='hidden-phone'> "+reuniao[i].tema+"</td>"
                                +"<td>"+ data_atual +"</td>"
                                +"<td>"
                                +    "<a class='btn_link' href='/reunioes/alterar/"+reuniao[i].id+"' alt='alterar'><button class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a>"
                                +    "<a class='btn_link' href='/reunioes/del/"+reuniao[i].id +"'    alt='deletar'><button class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button></a>"
                                // +    "<a class='btn_link' href='/presencas/alt/"+reuniao[i].id+"' alt='presencas'><button class='btn btn-info btn-xs'><i class='fa fa-check-square'></i></button></a>"
                                +"</td>"
                            +"</tr>";
                }

                $("#retorno").html(html);
            },
            'json'
        );
    });


});
</script>

@stop