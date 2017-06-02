@extends('layouts.dashboard.layout')

@section('conteudo')
<?php
    if(!isset($post)){ 
        $actionForm = "/posts/cadastrar/save";
        $messageButton = "Cadastrar";
        $post = [
            'nome'      => '',
            'tipo'      => '',
            'data'      => '',
            'descricao' => '',
            'link'      => '',
        ];
    } else { 
        $actionForm = "/posts/up/{$post['id']}";
        $messageButton = "Alterar";
    }
?>
<div class="row mt">
  <div class="col-lg-12">

    <form class="form-horizontal style-form" id="form" method="post" action="{{$actionForm}}"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Nova Postagem
            <button type="button" id="btn-preencher" class="btn btn-info pull-right">Preencher</button>
            </h4>

			<div class="row">

			    <div class="col-sm-4">
			    	<label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $post['nome'] }}">
                </div>

                <div class="col-sm-4">
                	<label for="tipo">Tipo</label>
                    <select id="tipo" name="tipo" class="form-control">
                    	<option>-- Selecione --</option>
                    	<option {{ ($post['tipo'] == 'video') ? 'selected' : '' }} value="video">Vídeo</option>
                    	<option {{ ($post['tipo'] == 'audio') ? 'selected' : '' }} value="audio">Áudio</option>
                    	<option {{ ($post['tipo'] == 'imagem') ? 'selected' : '' }} value="imagem">Imagem</option>
                    </select>
                </div>
                <div class="col-sm-4">

                	<label for="data">Data</label>
					<input type="date" name="data" id="data" class="form-control" value="{{ $post['data'] }}">
                </div>
			</div>

			<div class="row">
			    <div class="col-sm-12">
			    	<label for="descricao">Descrição</label>
                    <textarea rows="" cols="15" class="form-control" name="descricao" id="descricao" value="{{ $post['descricao'] }}"></textarea>
                </div>
			</div>

			<div class="row">
			    <div class="col-sm-12">
			    	<label for="link">Adicione o Link</label>
			    	<input type="text" class="form-control" name="link" id="link" value="{{ $post['link'] }}">

                </div>
			</div>


            <div class="row" style="margin-top:10px" >
                <div class="col-md-12" id="midia">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-11 grupo_btn_cadastro">
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Limpar</button>
                    <button type="button" class="btn_link btn btn-success " id="btn-enviar">{{$messageButton}}</button>
                </div>
            </div>

        </div>
    </form>
  </div>
</div>

<script type="text/javascript" src="/js/post.js"></script>
@stop