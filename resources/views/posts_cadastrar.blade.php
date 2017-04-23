@extends('layouts.dashboard.layout')

@section('conteudo')

<div class="row mt">
  <div class="col-lg-12">

    <form class="form-horizontal style-form" method="post" action="/posts/cadastrar/save"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Nova Postagem</h4>
			
			<div class="row">
			
			    <div class="col-sm-6">			    
			    	<label for="descricao">Nome</label>
                    <input type="text" class="form-control" name="nome" >
                </div>
                
                <div class="col-sm-6">
                	<label for="descricao">Tipo</label>
                    <select id="tipo" name="tipo" class="form-control" >
                    	<option>-- Selecione --</option>
                    	<option value="video">Vídeo</option>
                    	<option value="audio">Áudio</option>
                    	<option value="imagem">Imagem</option>
                    </select>
                </div>
                
			</div>

			<div class="row">
			    <div class="col-sm-12">
			    	<label for="descricao">Descrição</label>
                    <textarea rows="" cols="15" class="form-control" name="descricao" id="descricao"></textarea>
                </div>
			</div>

			<div class="row">
			    <div class="col-sm-12">
			    	<label for="descricao">Adicione o Link</label>
			    	<input type="text" class="form-control" name="link" >
                    
                </div>
			</div>

            
            <div class="row" style="margin-top:10px" >
                <div class="col-md-12" id="midia">
                    <input type="file" name="image" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-11 grupo_btn_cadastro">
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Limpar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>                
            </div>
            
        </div>
    </form>
  </div>
</div>

<script type="text/javascript" src="/js/post.js"></script>
@stop