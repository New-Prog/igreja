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
                            <option value="cpf">CPF</option>
                            <option value="nome">Nome</option>
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
    <div class="col-sm-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
              <h4><i class="fa fa-angle-right"></i> Membros <a class="btn_link btn btn-success pull-right" href="/membros/cadastrar"> Novo<span class="glyphicon glyphicon-plus"></span></a> </h4>
              <hr>
                <thead>
                <tr>
                    <th><i class="fa fa-bullhorn"></i> Nome</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Celula</th>
                    <th><i class="fa fa-bookmark"></i> Hierarquia</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody id='retorno'>

                    @foreach($membros as $membro)
                        <tr title="Detalhe do membro"style='cursor:pointer' >
                            <td onclick="javascript: requestServer('api/membros/{{ $membro['id']}}', 'membro')"> {{ $membro['nome'] }}</td>
                            <td onclick="javascript: requestServer('api/membros/{{ $membro['id']}}', 'membro')" class="hidden-phone"> {{ ucfirst($membro['celula']['nome']) }}</td>
                            <td onclick="javascript: requestServer('api/membros/{{ $membro['id']}}', 'membro')" >{{ ucfirst($membro['tipo']) }}</td>
                            <td>
                                <a class="btn_link" href="/membros/alterar/{{ $membro['id'] }}" alt="alterar"><button title='alterar' class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <a class="btn_link" href="/membros/del/{{ $membro['id'] }}" alt="deletar" ><button title='deletar'class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->
<div>
<script type="text/javascript">
$(document).ready(function () {
    $("#filtro").on('change', function () {
        var html = '';
        if($(this).val() == 'cpf' || $(this).val() == 'nome') {
            html = "<input type='text' class='form-control' name='conteudo_filtro' id='conteudo_filtro'>";
            $("#retorno_filtro").html(html);

            //$("#retorno_filtro").closest('div.row').removeClass('hidden');
            //$("#btn_pesquisar").closest('div.row').removeClass('hidden');

        } else if ($(this).val() == 'fk_celula') {
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
        $.post( "/membros/getEspecifico",
            { filtro: $('#filtro').val(), conteudo_filtro: $('#conteudo_filtro').val() },
            function(data) {
                var html  = '';
                membro = data;
                for (var i in membro) {
                    html += "<tr title='Detalhe do membro' style='cursor:pointer' onclick=\"javascript: requestServer('api/membros/"+ membro[i].id+"', 'membro')\">"
                                +"<td> "+membro[i].nome+"</td>"
                                +"<td class='hidden-phone'> "+membro[i].celula.nome+"</td>"
                                +"<td>"+membro[i].tipo+"</td>"
                                +"<td>"
                                    +"<a class='btn_link'  href='/membros/alterar/"+membro[i].id+"' alt='alterar'><button title='alterar' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></button></a> "
                                    +"<a class='btn_link' href='/membros/del/"+membro[i].id+"' alt='deletar' ><button  title='deletar' class='btn btn-danger btn-xs'><i class='fa fa-trash-o '></i></button></a>"
                                +"</td>"
                            +"</tr>";
                }

                $("#retorno").html(html);
            },
            'json'
        );
    });


});
function requestServer(url, tipo) {
    $.get( url, function(data) {
        if(tipo == 'membro') {
            var  html = "<strong>Nome: </strong> " + data.nome     + "<br>"
            + "<strong>E-mail: </strong>"          + data.email    + "<br>"
            + "<strong>CPF: </strong>"             + data.cpf      + "<br>"
            + "<strong>Tel: </strong>"             + data.telefone + "<br>"
            + "<strong>Celular: </strong>"         + data.telefone;
        }
        modal.alerta('Detalhe do membro', html);

    }, 'json');
}
</script>


@stop