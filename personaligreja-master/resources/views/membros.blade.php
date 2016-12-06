@extends('layouts/principal')

@section('conteudo')
<style>
.escondido{
    display:none;
}
.text-center{
    text-align: center;;
}
</style>
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <label><i class="glyphicon glyphicon-user"></i> Membros </label>
            </div>
            <div class="panel-body">
               <div class="form-group">
                  <label> Escolha uma opção para realizar pesquisa de membro:</label>
                  <select class="form-control" name="tipo_pesquisa">
                      <option value="">-- Escolha --</option>
                      <option value="nome">Nome</option>
                      <option value="sobrenome">Sobrenome</option>
                      <option value="celula">Célula</option>
                      <option value="todos">Todos</option>
                   </select>  
                </div>
                <div class="form-group escondido">
                    <label>Digite a caracterisca do membro</label>
                    <input type="text" class="form-control" name="conteudo_pesquisa"> 
                </div>
            </div>
            <div class="panel-footer">
                <button class='btn btn-primary' id="pesquisar"><i class="glyphicon glyphicon-search"></i> Pesquisar membro</button>
                <button class='btn btn-success' id="cadastrar"><i class="glyphicon glyphicon-plus"></i>Cadastrar novo membro</button>
            </div>
        </div>
    </div>
</div>
<div id="retorno">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                
                    <table class="table table-hover">
                        <thead>
                            <tr class="">
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Celula</th>
                                <th></th>
                            </tr>
                        <thead>
                        <tbody></tbody>
                        <tfoot></tfoot>    
                    </table>
                
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts/rodape')
<script type="text/javascript" src="assets/js/membros.js"></script>
</script>
@stop