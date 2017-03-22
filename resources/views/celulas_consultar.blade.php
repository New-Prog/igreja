@extends('layouts.dashboard.layout')

@section('conteudo')
<?php 
    if(!isset($membro)){ 
        // $actionForm = "/membros/cadastrar/salvar";
        // $messageButton = "Cadastrar";
        // $membro = null;
    } else { 
        $actionForm = "/celulas/up/{$membro['id']}";
        $messageButton = "Alterar";
    }
?>
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
                                <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                <input type="submit" />
                                <a href="/celulas/del/{{$celula->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->

        <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">    
                <a href="/celulas/cadastrar"><button type="submit" class="btn btn-theme">Cadastrar Celula</button></a>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
@stop