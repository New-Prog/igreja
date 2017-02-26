`extends('layouts/home')

@section('conteudo')

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
                      <option value="membro_cpf">CPF</option>
                      <option value="membro_nome">Nome</option>
                      <!--<option value="sobrenome">Sobrenome</option>-->
                      <option value="membro_id_celula">Célula</option>
                      <option checked value="todos">Todos</option>
                   </select>  
                </div>
                <div class="form-group escondido">
                    <label>Digite a caracterisca do membro</label>
                    <input type="text" class="form-control" name="conteudo_pesquisa"> 
                </div>
            </div>
            <div class="panel-footer">
                <button class='btn btn-primary' id="pesquisar"><i class="glyphicon glyphicon-search"></i> Pesquisar membro</button>
                <button class='btn btn-success' id="cadastrar_modal"  onclick="javascript: acoes_cad_modal();" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus" ></i>Cadastrar novo membro</button>
            </div>
        </div>
    </div>
</div>
<div id="retorno" class="hidden">
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





<!-- <div class="container"> -->
  <!-- <h2>Modal Example</h2> -->
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Membro</h4>
        </div>
        <div class="modal-body">


			<div class="row">

			    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
			    <div class="col-sm-10 col-sm-offset-1">
			        <!-- <div class="panel panel-primary"> -->

			         <!--    <div class="panel-heading">
			                <h1 class="panel-title">Cadastrar Membro</h1>
			            </div> -->


			            <!-- <div class="panel-body"> -->
                     <input type="hidden" name="id" id="id" >
                     <input type="hidden" name="deonde" id="deonde" value='cadastrado'> 

                      <div class="form-group">

			            	 <input type="text" class="form-control" name="membro_cpf" id="membro_cpf" placeholder="CPF">
			                </div>

			               	<div class="form-group">
			                  <input type="text" class="form-control" name="membro_nome" id="membro_nome" placeholder="Nome">
			               	</div>

			               	<div class="form-group">
			                  <input type="text" class="form-control" name="membro_sobrenome" id="membro_sobrenome" placeholder="Sobreome">
			               	</div>

			               	<div class="form-group">
			                  <input type="text" class="form-control" name="membro_rg" id="membro_rg" placeholder="RG">
				           	</div>

			               	<div class="form-group">
			                  <input type="text" class="form-control" name="membro_data_nascimento" id="membro_data_nascimento" placeholder="Data de Nascimento">
				           	</div>

			               	<div class="form-group">
			                  <input type="text" class="form-control" name="membro_cep" id="membro_cep" placeholder="CEP">
				           	</div>

			               	<div class="form-group">
			                  <input type="text" class="form-control" name="membro_endereco" id="membro_endereco" placeholder="Endereço">
				           	</div>

			               	<div class="form-group">
			                  <input type="text" class="form-control" name="membro_telefone_1" id="membro_telefone_1" placeholder="Digite seu telefone residêncial ">
				           	</div>


			               	<div class="form-group">
			                  <input type="text" class="form-control" name="membro_telefone_2" id="membro_telefone_2" placeholder="Digite seu telefone celular">
				           	</div>


			               	<div class="form-group">
				               	<select class="form-control" name="membro_id_celula" id="membro_id_celula" >
				               		<option value="">-- Selecione um célula --</option>
				               		<option value="1">Deus é salvação - Katrina</option>
				               		<option value="2">Deus é o rei - João Carlos</option>
				               	</select>
				           	</div>

			               	<div class="form-group">
				               	<select class="form-control" name="membro_tipo" id="membro_tipo" >
				               		<option value="">-- Selecione o tipo de membro --</option>
				               		<option value="1">Visitante</option>
				               		<option value="2">Fiel</option>
				               		<option value="3">Líder</option>
				               	</select>
				           	</div>
			                  


			            </div>
			            <div class="panel-footer">
			                <button class='btn btn-success' id="cadastrar"><i class="glyphicon glyphicon-plus"></i><span>Enviar</span></button>
			            </div>

			        <!-- </div> -->
			    <!-- </div> -->
			</div>


        </div>
    <!--     <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
      
    </div>
  </div>
  
<!-- </div> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/membro.js"></script>

@stop