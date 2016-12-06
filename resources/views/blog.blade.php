@extends('layouts/home')

@section('conteudo')
<div class="row">
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Post</h1>
            </div>
            <div class="panel-body">
                <div class="form-group">
                  <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor">
                </div>
               <div class="form-group">
                  <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo">
                </div>
                <div class="form-group">
                    <textarea style="resize:none;" rows="10" class="form-control" name="descricao" id="descricao" placeholder="Descrição"></textarea>
                </div>
            </div>
            <div class="panel-footer">
                <button class='btn btn-success' id="cadastrar"><i class="glyphicon glyphicon-plus"></i>Incluir</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/blog.js"></script>

@stop