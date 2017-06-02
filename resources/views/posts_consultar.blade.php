
@extends('layouts.dashboard.layout')

@section('conteudo')
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                  <h4><i class="fa fa-angle-right"></i> Postagens e Noticias
                        <a class="btn_link btn btn-success pull-right" href="/posts/cadastrar"> Novo<span class="glyphicon glyphicon-plus"></span></a>
                  </h4>
                  <hr>
                    <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> Nome</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrição</th>
                        <th><i class="fa fa-bookmark"></i>Tipo</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post['nome'] }}</td>
                            <td class="hidden-phone">{{ $post['descricao'] }}</td>

                            <td>{{ $post['tipo'] }}</td>
                            <td>
                                <a class="btn_link" href="/posts/alterar/{{ $post['id'] }}" alt="alterar"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <a class="btn_link" href="/posts/del/{{ $post['id'] }}" alt="deletar" ><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->

@stop