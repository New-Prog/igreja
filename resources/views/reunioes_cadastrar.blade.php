@extends('layouts.dashboard.layout')

@section('conteudo')
<?php
if(!isset($reuniao)){
	$actionForm = "/reunioes/cadastrar/save";
    $messageButton = "Cadastrar";
    $reuniao = null;
} else {
	$actionForm = "/reunioes/up/{$reuniao['id']}";
	$messageButton = "Alterar";
	$data = explode('-', $reuniao['data']);
	$reuniao['data'] = $data[2]."/".$data[1]."/".$data[0];
}
?>
<link rel="stylesheet" href="/bower_components/sweetalert2/dist/sweetalert2.min.css">
<form class="form-horizontal style-form" method="post" action="{{$actionForm}}">
    <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Nova Reunião
            <button type="button" class="btn btn-info pull-right" id="btn-preencher">Preencher</button>
        </h4>

        <div class="form-group">
            <div class="col-md-6 col-sm-6">
            <label class="control-label">Tema:</label>
                <input id="tema" type="text" class="form-control" value="{{ $reuniao['tema'] }}" name="tema">
            </div>
            <div class="col-md-6 col-sm-6">
                <label class="control-label">Celula Participante</label>
                <select type="tipo" class="form-control"  name="fk_celula" id="fk_celula">
                        <option value="">--Selecione--</option>
                    @foreach ($celulas as $celula)
                        <option <?= ($reuniao['fk_celula']==$celula['id']) ? 'selected' : ''?> value="{{ $celula['id'] }}">{{ $celula['nome'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-6">
                <label class="control-label">Descrição</label>
                <input id="descricao" type="text" class="form-control" name="descricao" value="{{ $reuniao['descricao']}}">
            </div>
            <div class="col-sm-6">
                <label class="control-label">Data</label>
                <input id="data" type="text" class="form-control" name="data" value="{{ $reuniao['data']}}">
            </div>
        </div>

        <h4 class="mb"><i class="fa fa-angle-right"></i>Endereço</h4>
        <div class="form-group">
            <div class="col-sm-2">
                <label class="control-label">CEP:</label>
                <input id="cep" type="text" class="form-control" name="cep" value="{{ $reuniao['cep']}}" placeholder="00000-000">
            </div>
            <div class="col-sm-5">
               <label class="control-label">Logradouro</label>
                <input id='logradouro' type="text" class="form-control" name="logradouro" value="{{ $reuniao['logradouro']}}" placeholder="Rua xxxxx">
            </div>
            <div class="col-sm-1">
                <label class="control-label">Numero</label>
                <input id='numero' type="text" class="form-control" name="numero" value="{{ $reuniao['numero']}}" placeholder="132">
            </div>
            <div class="col-sm-4">
                <label class="control-label">Complemento</label>
                <input id='complemento' type="text" class="form-control" name="complemento" value="{{ $reuniao['complemento']}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <label class="control-label">Bairro</label>
                <input id='bairro' type="text" class="form-control" name="bairro" value="{{ $reuniao['bairro']}}" placeholder="Centro">
            </div>

            <div class="col-sm-4">
                <label class="control-label">Cidade</label>
                <input id='cidade' type="text" class="form-control" name="cidade" value="{{ $reuniao['cidade']}}" placeholder="São Paulo">
            </div>
            <div class="col-sm-1">
                <label class="control-label">Estado</label>
                <input id='estado' type="text" class="form-control" name="estado" value="{{ $reuniao['estado']}}" placeholder="SP">
            </div>
        </div>

    <div class="form-panel barra-botoes">
        <div class="form-group">
            <div class="col-sm-11 grupo_btn_cadastro">
                <a href="/reunioes/consultar" class='btn btn-danger'>Cancelar</a>
                <button id='btn_limpar' type="button" class="btn btn-warning">Limpar</button>
                <button id="btn_enviar" class="btn btn-success">{{ $messageButton }}</button>

            </div>
        </div>
    </div>

</form>

<script type="text/javascript" src="/dashboard_layout/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.mask.js"></script>
<script src="/bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
<script type="text/javascript" src="/js/reuniao.js"></script>
@stop