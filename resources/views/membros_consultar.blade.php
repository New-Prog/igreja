
@extends('layouts.dashboard.layout')

@section('conteudo')
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                  <h4><i class="fa fa-angle-right"></i> Membros </h4>
                  <hr>
                    <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> Nome</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Celula</th>
                        <th><i class="fa fa-bookmark"></i> Hierarquia</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($membros as $membro)
                        <tr>
                            <td><a href="basic_table.html#">{{ $membro['nome'] }}</a></td>
                            <td class="hidden-phone">{{ $membro['fk_celula'] }}</td>
                            <td>{{ $membro['tipo'] }}</td>
                            <td>
                                <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                <a href="/membros/alterar/{{ $membro['id'] }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                            </td>
                        </tr>
                    @endforeach
                    
                    
                    </tbody>
                </table>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
@stop