@extends('layouts.dashboard.layout')

@section('conteudo')
<div class="form-panel barra-botoes">
    <div class="form-group">
        <div class="col-sm-11 grupo_btn_cadastro">
            <a class="btn_link" href="/membros/cadastrar">
                <button class="btn btn-success btn_link">Cadastrar <span class="glyphicon glyphicon-plus"></span></button>

            <a>
        </div>  
    </div> 
</div>  
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">

            <div class="row">
                 <div class="col-sm-8 col-sm-offset-2">
                    <div class="form-group">
                        <label class="control-label"><strong>Buscar por:</strong></label>
                        <select class="form-control" name="filtro" id="filtro">
                            <option value="">--Selecione--</option>
                            <option value="cpf">CPF</option>
                            <option value="nome">Nome</option>
                            <option value="fk_celula">Célula</option>
                        </select>
                    </div>
                </div> 
            </div>

            <div class="row hidden" style="">
                 <div class="col-sm-8 col-sm-offset-2">
                    <div id="retorno_filtro" class="form-group"></div>
                </div> 
            </div>

            <div class="row hidden">
                <div class="col-sm-8 col-sm-offset-2">
                    <button class="btn btn-primary btn-block" id="btn_pesquisar">Pesquisar</button>
                </div>
            </div>

        </div>
    </div>  
</div>

<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
              <h4><i class="fa fa-angle-right"></i> Membros </h4>
              <hr>
                <thead>
                <tr>
                    <th><i class="fa fa-bullhorn"></i> Nome</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Celula</th>
                    <th><i class="fa fa-bookmark"></i> Hierarquia</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($membros as $membro)
                        <tr>
                            <td style='cursor:pointer' onclick="javascript: requestServer('api/membros/{{ $membro['id']}}', 'membro')"> {{ $membro['nome'] }}</td>
                            <td class="hidden-phone"> {{ ucfirst($membro['celula']['nome']) }}</td>
                            <td>{{ ucfirst($membro['tipo']) }}</td>
                            <td>
                                <a class="btn_link" href="/membros/alterar/{{ $membro['id'] }}" alt="alterar"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <a class="btn_link" href="/membros/del/{{ $membro['id'] }}" alt="deletar" ><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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
            html = "<input type='text' class='form-control' name='conteudo_filtro'>";
            $("#retorno_filtro").html(html);
            $("#retorno_filtro").closest('div.row').removeClass('hidden');
            $("#btn_pesquisar").closest('div.row').removeClass('hidden');
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
                $("#retorno_filtro").closest('div.row').removeClass('hidden');
                $("#btn_pesquisar").closest('div.row').removeClass('hidden');
            }, 'json'); 
        } else {
            $("#retorno_filtro").val('').closest('div.row').addClass('hidden');
            $("#btn_pesquisar").closest('div.row').addClass('hidden');
        }
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
});
</script>


@stop