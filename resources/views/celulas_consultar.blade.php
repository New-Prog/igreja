@extends('layouts.dashboard.layout')

@section('conteudo')
<?php var_dump($celulas) ?>
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
                        <th><i class="fa fa-bookmark"></i> Quantidade de membros</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($celulas as $celula)
                        <tr>
                            <td><a href="basic_table.html#">Celula do céu</a></td>
                            <td class="hidden-phone">Albert Einstein</td>
                            <td>4</td>
                            <td>
                                <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
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