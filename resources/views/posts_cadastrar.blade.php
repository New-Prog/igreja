@extends('layouts.dashboard.layout')

@section('conteudo')
<?php
    $post = array(
        'nome' =>'a' ,'descricao'=>'a','tipo'=>'axxxxx'
    );
?>
<h3><i class="fa fa-angle-right"></i> Cadastro de Postagens</h3>
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
  <div class="col-lg-12">

    <form class="form-horizontal style-form" method="post" action="/posts/cadastrar/save"  enctype="multipart/form-data">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Nova Postagem</h4>

            <div class="form-group">
                <label class="col-sm-1  control-label">Nome</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="nome" value="{{ $post['nome']}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1  control-label">Descrição</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="descricao" value="{{ $post['descricao']}}">
                </div>
            </div>

             <div class="form-group">
                <label class="col-sm-1  control-label">Tipo</label>
                <div class="col-sm-11">
                    <input id="cep" type="text" class="form-control" name="tipo" value="{{ $post['tipo']}}">
                </div>
            </div>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <input type="file" name="image" />
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-11 grupo_btn_cadastro">
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Limpar</button>
                    <button type="submit" class="btn btn-success"></button>
                </div>
            </div>
        </div>
    </form>

  </div><!-- col-lg-12-->
</div><!-- /row -->


@stop