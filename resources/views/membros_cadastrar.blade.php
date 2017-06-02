@extends('layouts.dashboard.layout')

@section('conteudo')

<?php

    if(!isset($membro)){
        $actionForm = "/membros/cadastrar/salvar";
        $messageButton = "Cadastrar";
        $membro = null;
    } else {
        $actionForm = "/membros/up/{$membro['id']}";
        $messageButton = "Alterar";
    }
?>
<link rel="stylesheet" href="/bower_components/sweetalert2/dist/sweetalert2.min.css">

<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
  <div class="col-lg-12">

    <form class="form-horizontal style-form" method="post" action="{{ $actionForm }}">
        <div class="form-panel">

            <div class="col-md-12" >
                <button type="button" class="btn btn-info pull-right" id="btn-preencher">Preencher</button>
            </div>

            <div class="form-group">
                <div class="col-sm-4 ">
                    <label class="control-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="{{ $membro['nome']}}" placeholder="EX: João">
                </div>
                <div class="col-sm-4">
                    <label class="control-label">E-mail:</label>
                    <input id="email" type="text" class="form-control" name="email" value="{{ $membro['email']}}" placeholder="EX: joao@ibvn.com.br">
                </div>
                <div class="col-sm-4">
                    <label class="control-label">Data de Nascimento:</label>
                    <input id="dt_nasc" type="text" class="form-control" name="dt_nasc" value="{{ $membro['dt_nasc']}}" placeholder="EX: 10/10/2000">
                </div>
             </div>
            <div class="form-group">
                <div class="col-sm-2">
                    <label class="control-label">CPF:</label>
                    <input id="cpf" type="text" class="form-control" name="cpf" value="{{ $membro['cpf']}}" placeholder="000.000.000-00">
                </div>
                <div class="col-sm-2">
                	<label>Sexo</label>
                    <div class="radio" style="padding:0px; margin:0px" >
                        <label>
                        <input type="radio" name="sexo" id="sexoM" value="m" <?= $membro['sexo'] == 'm' ? 'checked' : '' ?> >
                            Masculino
                        </label>
                        <label>
                        <input type="radio" name="sexo" id="sexoF" value="f" <?= $membro['sexo'] == 'f' ? 'checked' : '' ?> >
                            Feminino
                        </label>
                    </div>
                </div>
                <div class="col-sm-2">
                <label class="control-label">Estado Civil</label>
                    <select type="tipo" class="form-control" name="estado_civil" id="estado_civil">
                        <option <?= $membro['estado_civil'] == 'solteiro' ? 'selected' : '' ?> value="solteiro">Solteiro(a)</option>
                        <option <?= $membro['estado_civil'] == 'casado' ? 'selected' : '' ?> value="casado">Casado(a)</option>
                        <option <?= $membro['estado_civil'] == 'divorciado' ? 'selected' : '' ?> value="divorciado">Divorciado(a)</option>
                        <option <?= $membro['estado_civil'] == 'viuvo' ? 'selected' : '' ?> value="viuvo">Viúvo(a)</option>
                        <option <?= $membro['estado_civil'] == 'separado' ? 'selected' : '' ?> value="separado">Separado(a)</option>
                        <option <?= $membro['estado_civil'] == 'companheiro' ? 'selected' : '' ?> value="companheiro">Companheiro(a)</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label class="control-label">Telefone Residencial:</label>
                    <input id="telefone" type="text" class="form-control" name="telefone" value="{{ $membro['telefone']}}" placeholder="(11)1111-111">
                </div>

                <div class="col-sm-3">
                    <label class="control-label">Celular:</label>
                    <input id="celular" type="text" class="form-control" name="celular" value="{{ $membro['celular']}}" placeholder="(11)11111-111">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2">
                    <label class="control-label">CEP:</label>
                    <input id="cep" type="text" class="form-control" name="cep" value="{{ $membro['cep']}}" placeholder="00000-000">
                </div>

                <div class="col-sm-5">
                   <label class="control-label">Logradouro</label>
                    <input id='logradouro' type="text" class="form-control" name="logradouro" value="{{ $membro['logradouro']}}" placeholder="Rua xxxxx">
                </div>

                <div class="col-sm-1">
                    <label class="control-label">Numero</label>
                    <input id='numero' type="text" class="form-control" name="numero" value="{{ $membro['numero']}}" placeholder="132">
                </div>
                <div class="col-sm-4">
                    <label class="control-label">Complemento</label>
                    <input id='complemento' type="text" class="form-control" name="complemento" value="{{ $membro['complemento']}}">
                </div>
            </div>

<!--             <div class="form-group">
            </div>    -->

            <div class="form-group">
                <div class="col-sm-2">
                    <label class="control-label">Bairro</label>
                    <input id='bairro' type="text" class="form-control" name="bairro" value="{{ $membro['bairro']}}" placeholder="Centro">
                </div>

                <div class="col-sm-4">
                    <label class="control-label">Cidade</label>
                    <input id='cidade' type="text" class="form-control" name="cidade" value="{{ $membro['cidade']}}" placeholder="São Paulo">
                </div>

                <div class="col-sm-1">
                    <label class="control-label">Estado</label>
                    <input id='estado' type="text" class="form-control" name="estado" value="{{ $membro['estado']}}">
                </div>

                <div class="col-sm-1 col-sm-offset-4" >
                	<img src="{{URL::asset('/images/perfil.png')}}" alt="..." class="img-thumbnail">
                </div>

            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label class="control-label">Celula Participante</label>
                    <select id="fk_celula" class="form-control"  name="fk_celula">
                            <option value="">--Selecione--</option>
                        @foreach ($celulas as $celula)
                            <option <?= ($membro['fk_celula']==$celula['id']) ? 'selected' : ''?> value="{{ $celula['id'] }}">{{ $celula['nome'] }}</option>
                        @endforeach
                    </select>
                </div>
<!--             </div>

            <div class="form-group"> -->
                <div class="col-sm-6">
                    <label class="control-label">Tipo de membro</label>
                    <select id="tipo" class="form-control" name="tipo">
                        <option value="">--Selecione--</option>
                        <option <?= $membro['tipo'] == 'membro' ? 'selected' : '' ?> value="membro">Membro</option>
                        <option <?= $membro['tipo'] == 'lider'  ? 'selected' : '' ?> value="lider">Lider</option>
                        <option <?= $membro['tipo'] == 'pastor' ? 'selected' : '' ?> value="pastor">Pastor</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="form-panel">
            <div class="row">
                <div class="col-sm-12 ">
                	<div class="pull-right">
	                    <a href="/membros/consultar" class='btn btn-danger'>Cancelar</a>
	                    <button id='btn_limpar' type="button" class="btn btn-warning">Limpar</button>
	                    <button id="btn_enviar" class="btn btn-success">{{ $messageButton }}</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

    </div>
  </div><!-- col-lg-12-->
</div><!-- /row -->


<script type="text/javascript" src="/dashboard_layout/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.mask.js"></script>
<script src="/bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
<script type="text/javascript" src="/js/membro.js"></script>

@stop