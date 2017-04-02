
@extends('layouts.dashboard.layout')

@section('conteudo')
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                  <h4><i class="fa fa-angle-right"></i> Postagens e Noticias </h4>
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
                            <td><a href="basic_table.html#">{{ $post['nome'] }}</a></td>
                            <td class="hidden-phone">{{ $post['descricao'] }}</td>
                            <td>{{ $post['tipo'] }}</td>
                            <td>
                                <a class="btn_link" href="/posts/alterar/{{ $post['id'] }}" alt="alterar"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <a class="btn_link" href="/post/del/{{ $post['id'] }}" alt="deletar" ><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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
            <a class="btn_link" href="/posts/cadastrar">
                <button class="btn btn-success btn_link">Cadastrar Nova Postagem</button>
            <a>
        </div>  
    </div> 
</div>  
@stop