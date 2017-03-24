@extends('layouts.dashboard.layout')

@section('conteudo')
<?php
    //     // $actionForm = "/membros/cadastrar/salvar";
    // if(!isset($membro)){ 
    //     // $messageButton = "Cadastrar";
    //     // $membro = null;
    // } else { 
    //     $actionForm = "/celulas/up/{$membro['id']}";
    //     $messageButton = "Alterar";
    // }
?>  
    <form method="post" name="teste" >
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                  <h4><i class="fa fa-angle-right"></i> Célula </h4>
                  <hr>
                    <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> Nome da Célula</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Líder</th>
                        <th><i class="fa fa-bookmark"></i>Descrição</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($celulas as $celula)
                        <tr>
                            <td><a href="basic_table.html#">{{ $celula->nome }}</a></td>
                            <td class="hidden-phone">{{ $celula->lider }}</td>
                            <td>{{ $celula->descricao }}</td>
                            <td>
                                <a href="/celulas/alterar/{{ $celula['id'] }}" alt="alterar"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->

    <div class="form-panel barra-botoes">
    <div class="form-group">
        <div class="col-sm-11 grupo_btn_cadastro">
            <a class="btn_link" href="/celulas/cadastrar">
                <button class="btn btn-success btn_link">Cadastrar Nova Célula</button>
            <a>
        </div>  
    </div> 
</div>  

@stop