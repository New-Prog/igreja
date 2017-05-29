<?php
use function GuzzleHttp\json_decode;
?>
@extends('layouts.dashboard.layout')

@section('conteudo')

<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">

            <div class="row">
                 <div class="col-sm-4 ">
					<select class="form-control" name="filtro" id="filtro">
						<option value="">--Buscar por--</option>
						<option value="todos">Todos</option>
						<option value="lider">Líder</option>
						<option value="nome">Nome</option>
					</select>
                </div>
                <div class="col-sm-4 " id="div_conteudo">

                </div>
                <div class="col-sm-2 ">
                	<button type="button" class="btn btn-primary btn-block" id="btn_pesquisar">Pesquisar</button>
                </div>

            </div>
        </div>
    </div>
</div>
    <form method="post" name="teste" >
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                  <h4><i class="fa fa-angle-right"></i> Célula <a class="btn btn_link btn-success pull-right" href="/celulas/cadastrar">Novo<span class="glyphicon glyphicon-plus"></span><a></h4>
                  <hr>
                    <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> Nome da Célula</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Líder</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id='body-table'>
					<?php
					$celulas = json_decode($celulas, true);
					?>
                    @foreach($celulas as $key => $celula)
                    <?php
                    	$nome_lider = (!$celula['lider']) ? '' : $celula['lider']['nome']
                    ?>

                        <tr>
                            <td>{{ $celula['nome'] }}</td>
                            <td class="hidden-phone">{{ $nome_lider}}</td>
                            <td>
                                <a class="btn_link" href="/celulas/alterar/{{ $celula['id'] }}" alt="alterar"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <a class="btn_link" href="/celulas/del/{{ $celula['id'] }}" alt="deletar" ><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->

</form>
<script type="text/javascript" src="/js/celula.js"></script>
@stop